<?php

namespace App\Livewire\User\Investments;

use App\Models\Investment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.user')]
class IndexInvestment extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $filter = 'latest';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setFilter($filterType)
    {
        $this->filter = $filterType;
        $this->resetPage();
    }

    public function render()
    {
        $query = Investment::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->filter === 'latest') {
            $query->latest();
        } elseif ($this->filter === 'followed') {
            $query->whereHas('users', function ($q) {
                $q->where('users.id', Auth::id());
            });
        }

        return view('livewire.user.investments.index-investment')->with([
            'investments' => $query->paginate(12)
        ]);
    }
}
