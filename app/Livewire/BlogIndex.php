<?php

namespace App\Livewire;

use App\Models\Blog;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class BlogIndex extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::all();

        Debugbar::info($this->blogs);
    }

    public function render()
    {
        return view('livewire.blog');
    }
}
