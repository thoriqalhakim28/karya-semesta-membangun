<?php

namespace App\Livewire\Forms;

use App\Models\Blog;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\Form;

class CreateBlogForm extends Form
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

    #[Validate]
    public $status = 'draft';

    protected function rules(): array
    {
        return [
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:published,draft'
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
            'status.required' => 'Status harus diisi.',
        ];
    }

    public function save()
    {
        $this->validate();

        $slug = Str::slug($this->title);

        $this->storedThumbnail = $this->thumbnail->store('thumbnails', 'public');

        Blog::create([
            'slug' => $slug,
            'thumbnail' => $this->storedThumbnail,
            'title' => $this->title,
            'category' => $this->category,
            'content' => $this->content,
            'status' => $this->status
        ]);
    }
}
