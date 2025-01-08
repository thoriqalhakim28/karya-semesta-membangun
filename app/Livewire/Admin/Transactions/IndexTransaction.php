<?php

namespace App\Livewire\Admin\Transactions;

use App\Models\Investment;
use App\Models\Program;
use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexTransaction extends Component
{
    use WithPagination;

    public $selectedTransaction = null;
    public $isModalOpen = false;
    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $transactionType = 'all';
    public $transactionableType = 'all';

    protected $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => ''],
        'startDate' => ['except' => ''],
        'endDate' => ['except' => ''],
        'transactionType' => ['except' => 'all'],
        'transactionableType' => ['except' => 'all']
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
    }

    public function updatedTransactionType()
    {
        $this->resetPage();
    }

    public function updatedTransactionableType()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'startDate',
            'endDate',
            'transactionType',
            'transactionableType',
        ]);
    }

    public function getTransactionsProperty()
    {
        $query = Transaction::query()
            ->with(['user', 'transactionable'])
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('transactionable', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->startDate && $this->endDate, function ($query) {
                $query->whereBetween('transaction_date', [
                    $this->startDate,
                    $this->endDate,
                ]);
            })
            ->when($this->transactionType !== 'all', function ($query) {
                $query->where('transaction_type', $this->transactionType);
            })
            ->when($this->transactionableType !== 'all', function ($query) {
                $query->where('transactionable_type', $this->getTransactionableClass());
            });

        return $query->orderBy('transaction_date', 'desc')->paginate(10);
    }

    private function getTransactionableClass()
    {
        return match ($this->transactionableType) {
            'program' => Program::class,
            'investment' => Investment::class,
            default => null
        };
    }

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

    public function delete(Transaction $transaction)
    {
        $transaction->delete();
    }

    public function render()
    {
        return view('livewire.admin.transactions.index-transaction')->with([
            'transactions' => $this->transactions,
        ]);
    }
}
