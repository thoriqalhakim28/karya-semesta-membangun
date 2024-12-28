<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $table = 'user_contacts';

    protected $fillable = [
        'user_id',
        'phone_number',
        'mandiri_account_number',
        'btn_account_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
