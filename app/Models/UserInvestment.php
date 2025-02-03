<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UserInvestment extends Model
{
    use HasUuids;

    protected $table = 'user_investments';

    protected $fillable = [
        'user_id',
        'investment_id',
        'join_date',
    ];
}
