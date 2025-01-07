<?php

namespace App\Models;

use App\Traits\HasTransactions;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, HasTransactions, HasUuids, SoftDeletes;

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
