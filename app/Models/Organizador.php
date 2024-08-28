<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    protected $fillable = [
        'user_id',
        'nome_empresa',
    ];

    public function usuario()
    {
        return $this->morphOne(User::class, 'polimorfismo');
    }

    public function events()
    {
        return $this->hasMany(Evento::class);
    }
}
