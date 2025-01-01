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

    #[Validate]
    public $title = '';

    #[Validate]
    public $category = '';

    #[Validate]
    public $content = '';

    protected function rules(): array
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

    public function save()
    {
        $this->validate();

        $uniqueName = time() . '.' . $this->thumbnail->getClientOriginalExtension();
        $slug = Str::slug($this->title);

        $this->thumbnail->storeAs(path: 'thumbnail', name: $uniqueName);

        Blog::create([
            'slug' => $slug,
            'thumbnail' => $uniqueName,
            'title' => $this->title,
            'category' => $this->category,
            'content' => $this->content,
        ]);
    }
}
