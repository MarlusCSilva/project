<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'redefinir_password',
    ];

    protected $casts = [
        'email_verificado_em' => 'datetime',
        'senha' => 'hashed',
    ];

    public function userable()
    {
        return $this->morphTo();
    }
}
