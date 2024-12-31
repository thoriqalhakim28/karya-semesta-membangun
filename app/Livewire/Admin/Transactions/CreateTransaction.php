<?php

namespace App\Livewire\Admin\Transactions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateTransaction extends Component
{
    public $type = 'program';

    public function render()
    {
        return view('livewire.admin.transactions.create-transaction');
    }
}
