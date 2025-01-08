<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ShowBlog extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.blogs.show-blog');
    }
}
