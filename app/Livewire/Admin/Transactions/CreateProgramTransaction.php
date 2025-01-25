<?php

namespace App\Livewire\Admin\Transactions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class CreateProgramTransaction extends Component
{
    public function render()
    {
        return view('livewire.admin.transactions.create-program-transaction');
    }
}
