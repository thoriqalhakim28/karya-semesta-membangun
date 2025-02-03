<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserProgram extends Model
{
    use HasUuids;

    protected $table = 'user_programs';

    protected $fillable = [
        'user_id',
        'program_id',
        'join_date',
    ];
}
