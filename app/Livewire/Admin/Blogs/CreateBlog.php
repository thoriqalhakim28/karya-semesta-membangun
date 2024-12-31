<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class CreateBlog extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $thumbnail;

    public function render()
    {
        return view('livewire.admin.blogs.create-blog');
    }
}
