<?php
namespace App\Livewire\Forms;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditBlogForm extends Form
{
    public $url;
    public $publicId;

    #[Validate]
    public $thumbnail;

    #[Validate]
    public $title = '';

    #[Validate]
    public $category = '';

    #[Validate]
    public $content = '';

    #[Validate]
    public $status;

    public function rules(): array
    {
        $rules = [
            'title'    => 'required|string',
            'category' => 'required|string',
            'content'  => 'required|string',
            'status'   => 'required|in:published,draft',
        ];

        if ($this->thumbnail && ! is_string($this->thumbnail)) {
            $rules['thumbnail'] = 'image|mimes:jpeg,png,jpg';
        }

        return $rules;
    }

    protected function messages(): array
    {
        return [
            'thumbnail.image'   => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes'   => 'Thumbnail harus berupa gambar dengan ekstensi jpeg, png, atau jpg.',
            'title.required'    => 'Judul harus diisi.',
            'category.required' => 'Kategori harus diisi.',
            'content.required'  => 'Konten harus diisi.',
            'status.required'   => 'Status harus diisi.',
        ];
    }

    public function setBlogData(Blog $blog = null)
    {
        if ($blog) {
            $this->url      = $blog->url;
            $this->publicId = $blog->public_id;
            $this->title    = $blog->title;
            $this->category = $blog->category;
            $this->content  = $blog->content;
            $this->status   = $blog->status;
        }
    }

    public function save($slug)
    {
        $this->validate();

        $blog = Blog::where('slug', $slug)->first();

        if ($blog->thumbnail) {
            $blog->update([
                'title'    => $this->title,
                'category' => $this->category,
                'content'  => $this->content,
                'status'   => $this->status,
            ]);
        } elseif ($this->thumbnail) {
            $newPublicId = date('YmdHis') . '-' . Str::random(12);

            cloudinary()->destroy($blog->public_id);

            $uploadedFileUrl = cloudinary()->upload($this->thumbnail->getRealPath(), [
                'folder'    => 'blogs',
                'public_id' => $newPublicId,
            ])->getSecurePath();

            $blog->update([
                'title'     => $this->title,
                'category'  => $this->category,
                'url'       => $uploadedFileUrl,
                'public_id' => 'blogs/' . $newPublicId,
                'content'   => $this->content,
                'status'    => $this->status,
            ]);
        }
    }
}
