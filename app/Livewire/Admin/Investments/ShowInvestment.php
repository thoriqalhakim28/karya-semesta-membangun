<?php

namespace App\Livewire\Admin\Investments;

use App\Livewire\Forms\EditInvestmentForm;
use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowInvestment extends Component
{
    public EditInvestmentForm $form;

    public $investment;

    public function mount($id)
    {
        $this->investment = Investment::findOrFail($id);

        $this->form->setInvestmentData($this->investment);
    }

    public function submit(): void
    {
        $this->form->save($this->investment->id);

        $this->dispatch('close-modal', 'edit-investment');
    }

    public function render()
    {
        return view('livewire.admin.investments.show-investment');
    }
}
