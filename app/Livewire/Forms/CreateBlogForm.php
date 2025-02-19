<?php
namespace App\Livewire\Forms;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateBlogForm extends Form
{
    #[Validate]
    public $thumbnail;

    #[Validate]
    public $title = '';

    #[Validate]
    public $category = '';

    #[Validate]
    public $content = '';

    #[Validate]
    public $status = 'draft';

    protected function rules(): array
    {
        return [
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
            'title'     => 'required|string',
            'category'  => 'required|string',
            'content'   => 'required|string',
            'status'    => 'required|in:published,draft',
        ];
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

    public function save()
    {
        $this->validate();

        $slug = Str::slug($this->title);

        $publicId = date('YmdHis') . '-' . Str::random(12);

        $uploadedFileUrl = cloudinary()->upload($this->thumbnail->getRealPath(), [
            'folder'    => 'blogs',
            'public_id' => $publicId,
        ])->getSecurePath();

        Blog::create([
            'slug'      => $slug,
            'title'     => $this->title,
            'category'  => $this->category,
            'url'       => $uploadedFileUrl,
            'public_id' => 'blogs/' . $publicId,
            'content'   => $this->content,
            'status'    => $this->status,
        ]);
    }
}
