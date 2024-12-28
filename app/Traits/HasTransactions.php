<?php

namespace App\Traits;

use App\Models\Transaction;

trait HasTransactions
{
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function createTransaction(array $attributes)
    {
        return $this->transaction()->create($attributes);
    }

    public function totalTransactionAmount()
    {
        return $this->transaction()->sum('amount');
    }
}
