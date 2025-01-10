<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'transactionable_id',
        'transactionable_type',
        'transaction_date',
        'transaction_type',
        'amount',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn($value) => "Rp" . number_format($value, 2, ',', '.'),
            set: fn($value) => intval($value),
        );
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
}
