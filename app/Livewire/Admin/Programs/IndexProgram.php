<?php

namespace App\Livewire\Admin\Programs;

use App\Models\Program;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexProgram extends Component
{

    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getProgramsProperty()
    {
        return Program::query()
            ->with(['transactions'])
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.programs.index-program', [
            'programs' => $this->programs
        ]);
    }
}
