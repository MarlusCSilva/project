<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'evento_id', 'user_id', 'nota_evento', 'comentario',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
