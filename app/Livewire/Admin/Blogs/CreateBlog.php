<?php
namespace App\Livewire\Admin\Blogs;

use App\Livewire\Forms\CreateBlogForm;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class CreateBlog extends Component
{
    use WithFileUploads;

    public CreateBlogForm $form;

    public function submit()
    {
        $this->form->save();

        $this->redirect(route('admin.blog.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.blogs.create-blog');
    }
}
