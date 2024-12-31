<?php

namespace App\Livewire\Admin\Investments;

use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowInvestment extends Component
{
    public $investment;

    public function mount($id)
    {
        $this->investment = Investment::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.investments.show-investment');
    }
}
