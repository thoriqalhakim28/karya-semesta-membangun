<?php

namespace App\Livewire\Admin\Investments;

use App\Livewire\Forms\CreateInvestmentForm;
use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexInvestment extends Component
{
    use WithPagination;

    public CreateInvestmentForm $form;

    #[Url(history: true)]
    public $search = '';

    public function submit()
    {
        $this->form->save();

        $this->dispatch('close-modal', 'create-investment');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getInvestmentsProperty()
    {
        return Investment::query()
            ->with(['transactions'])
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.investments.index-investment')->with([
            'investments' => $this->investments
        ]);
    }
}
