<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'user_id', 'evento_id', 'ticket',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'event_participant');
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}