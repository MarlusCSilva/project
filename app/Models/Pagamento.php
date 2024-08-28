<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'participante_id', 'preco', 'status', 'metodo_pagamento',
    ];

    public function registration()
    {
        return $this->belongsTo(Participante::class);
    }
}
