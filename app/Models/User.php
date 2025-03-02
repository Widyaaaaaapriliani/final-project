<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public $timestamps = false;

    protected $fillable = [
        'email', 'name', 'password', 'role', 'gender', 'address', 'phone', 'birth_date', 'profile_photo'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan', 'id');
    }
}
