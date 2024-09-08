<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    protected $table = 'organizadores';
    protected $fillable = [
        'user_id',
        'nome_empresa',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}

