<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function contact()
    {
        return $this->hasOne(UserContact::class);
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function family()
    {
        return $this->hasOne(UserFamily::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'user_programs');
    }

    public function investments()
    {
        return $this->belongsToMany(Investment::class, 'user_investments');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
