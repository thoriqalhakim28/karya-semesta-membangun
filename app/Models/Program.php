<?php

namespace App\Models;

use App\Traits\HasTransactions;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, HasTransactions, HasUuids;

    protected $table = 'programs';

    protected $fillable = [
        'name',
        'description',
        'target',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_programs');
    }
}
