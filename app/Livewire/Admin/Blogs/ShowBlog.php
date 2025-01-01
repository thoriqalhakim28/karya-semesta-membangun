<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowBlog extends Component
{
    public function render()
    {
        return view('livewire.admin.blogs.show-blog');
    }
}
