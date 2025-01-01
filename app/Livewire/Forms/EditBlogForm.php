<?php

namespace App\Livewire\Forms;

use App\Models\Blog;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditBlogForm extends Form
{
    #[Validate]
    public $thumbnail;

    public $storedThumbnail;

    #[Validate]
    public $title = '';

    #[Validate]
    public $category = '';

    #[Validate]
    public $content = '';

    public function rules(): array
    {
        return [
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berupa gambar dengan ekstensi jpeg, png, atau jpg.',
            'title.required' => 'Judul harus diisi.',
            'category.required' => 'Kategori harus diisi.',
            'content.required' => 'Konten harus diisi.',
        ];
    }

    public function setBlogData(Blog $blog = null)
    {
        if($blog) {
            $this->thumbnail = $blog->thumbnail;
            $this->storedThumbnail = $blog->thumbnail;
            $this->title = $blog->title;
            $this->category = $blog->category;
            $this->content = $blog->content;
        }
    }
}
