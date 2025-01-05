<?php

namespace App\Livewire\Admin\Programs;

use App\Models\Program;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class ShowProgram extends Component
{
    use WithPagination, WithoutUrlPagination;

    public Program $program;
    public $totalAmount = 0;

    public function mount($id)
    {
        $this->program = Program::with(['users'])->findOrFail($id);
        $this->totalAmount = $this->program->totalTransactionAmount();
    }

    public function getTransactionsProperty()
    {
        return $this->program->transactions()
            ->with('user')
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.programs.show-program', [
            'transactions' => $this->transactions
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
