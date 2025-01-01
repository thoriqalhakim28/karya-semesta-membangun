<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexBlog extends Component
{
    public function render()
    {
        return view('livewire.admin.blogs.index-blog')->with([
            'blogs' => Blog::paginate(10)
        ]);
    }
}
