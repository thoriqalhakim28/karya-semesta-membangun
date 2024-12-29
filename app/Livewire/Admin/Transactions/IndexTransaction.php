<?php

namespace App\Livewire\Admin\Transactions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexTransaction extends Component
{
    public function render()
    {
        return view('livewire.admin.transactions.index-transaction');
    }
}
