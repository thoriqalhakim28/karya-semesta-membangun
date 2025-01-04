<?php

namespace App\Livewire\Admin\Transactions;

use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexTransaction extends Component
{
    public $selectedTransaction = null;
    public $isModalOpen = false;

    public function showTransactionDetail($transactionId)
    {
        $this->selectedTransaction = Transaction::with(['user', 'transactionable'])->find($transactionId);
        $this->isModalOpen = true;

        $this->dispatch('open-modal', 'detail-transaction');
    }

    public function resetTransactionDetail()
    {
        $this->selectedTransaction = null;
        $this->isModalOpen = false;

        $this->dispatch('close-modal', 'detail-transaction');
    }

    public function render()
    {
        return view('livewire.admin.transactions.index-transaction')->with([
            'transactions' => Transaction::with(['user', 'transactionable'])->paginate(15)
        ]);
    }
}
