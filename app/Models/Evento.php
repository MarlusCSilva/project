<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'data', 'hora', 'localizacao', 
        'maximo_participantes', 'categoria', 'organizador_id',
    ];

    public function organizador()
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
