<?php

namespace App\Livewire\Admin\Blogs;

use App\Livewire\Forms\EditBlogForm;
use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class EditBlog extends Component
{
    use WithFileUploads;

    public EditBlogForm $form;

    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->first();

        $this->form->setBlogData($this->blog);
    }

    public function removeUpload($field)
    {
        $this->form->$field = null;
    }

    public function render()
    {
        return view('livewire.admin.blogs.edit-blog');
    }
}
