<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'user_id', 'evento_id',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }


    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_participante', 'participante_id', 'evento_id');
    }


}