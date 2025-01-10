<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class IndexBlog extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::where('status', 'published')->get();
    }

    public function render()
    {
        return view('livewire.blogs.index-blog');
    }
}
