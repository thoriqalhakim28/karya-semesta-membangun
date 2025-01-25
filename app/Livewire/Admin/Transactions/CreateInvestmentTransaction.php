<?php

namespace App\Livewire\Admin\Transactions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateInvestmentTransaction extends Component
{
    public function render()
    {
        return view('livewire.admin.transactions.create-investment-transaction');
    }
}
