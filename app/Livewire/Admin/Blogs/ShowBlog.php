<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowBlog extends Component
{

    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.admin.blogs.show-blog');
    }
}
