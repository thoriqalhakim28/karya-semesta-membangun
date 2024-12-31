<?php

namespace App\Livewire\Admin\Investments;

use App\Livewire\Forms\CreateInvestmentForm;
use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexInvestment extends Component
{
    public CreateInvestmentForm $form;

    public function submit()
    {
        $this->form->save();

        $this->dispatch('close-modal', 'create-investment');
    }

    public function render()
    {
        return view('livewire.admin.investments.index-investment')->with([
            'investments' => Investment::all()
        ]);
    }
}
