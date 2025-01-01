<?php

namespace App\Livewire\Admin\Blogs;

use App\Livewire\Forms\CreateBlogForm;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class CreateBlog extends Component
{
    use WithFileUploads;

    public CreateBlogForm $form;

    public function submit(): void
    {
        $this->form->save();

        $this->redirect(route('admin.blogs.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.blogs.create-blog');
    }
}
