<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'user_id', 'evento_id', 'ticket',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function eventos()
    {
        return $this->belongsTo(Evento::class);
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}