<?php

namespace App\Livewire\Admin\Investments;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateInvestment extends Component
{
    public function render()
    {
        return view('livewire.admin.investments.create-investment');
    }
}
