<?php

namespace App\Livewire\User\Investments;

use App\Models\Investment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class IndexInvestment extends Component
{
    public function render()
    {
        return view('livewire.user.investments.index-investment')->with([
            'investments' => Investment::all()
        ]);
    }
}
