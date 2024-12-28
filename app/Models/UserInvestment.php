<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInvestment extends Model
{
    protected $table = 'user_investments';

    protected $fillable = [
        'user_id',
        'investment_id',
        'join_date',
    ];
}
