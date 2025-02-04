<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'user_addresses';

    protected $fillable = [
        'user_id',
        'type',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
