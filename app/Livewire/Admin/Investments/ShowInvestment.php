<?php

namespace App\Livewire\Admin\Investments;

use App\Livewire\Forms\EditInvestmentForm;
use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class ShowInvestment extends Component
{
    use WithPagination, WithoutUrlPagination;

    public EditInvestmentForm $form;

    public Investment $investment;
    public $totalAmount = 0;

    public function mount($id)
    {
        $this->investment = Investment::with(['users'])->findOrFail($id);
        $this->totalAmount = $this->investment->totalTransactionAmount();

        $this->form->setInvestmentData($this->investment);
    }

    public function getTransactionsProperty()
    {
        return $this->investment->transactions()
            ->with('user')
            ->latest()
            ->paginate(10);
    }

    public function submit(): void
    {
        $this->form->save($this->investment->id);

        $this->dispatch('close-modal', 'edit-investment');
    }

    public function render()
    {
        return view('livewire.admin.investments.show-investment', [
            'transactions' => $this->transactions
        ]);
    }
}
