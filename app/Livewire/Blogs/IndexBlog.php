<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.guest')]
class IndexBlog extends Component
{
    use WithPagination;

    #[Url( as :'q')]
    public $search;

    #[Url(history: true)]
    public $filter = 'all';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    #[Computed()]
    public function filteredBlogs()
    {
        $query = Blog::query()->where('status', 'published');

        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        switch ($this->filter) {
            case 'all':
                break;
            case 'informasi':
                $query->where('category', 'informasi');
                break;
            case 'artikel':
                $query->where('category', 'artikel');
                break;
            case 'berita':
                $query->where('category', 'berita');
                break;
        }

        return $query->paginate(10);
    }

    public function render()
    {
        Debugbar::info($this->filteredBlogs);

        return view('livewire.blogs.index-blog', [
            'blogs' => $this->filteredBlogs,
        ]);
    }
}
