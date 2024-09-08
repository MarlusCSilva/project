<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Evento extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'data', 'hora', 'localizacao', 
        'maximo_participantes', 'status','categoria', 'url',
        'organizador_id',
    ];

    public function organizador()
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'evento_participante');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function storeArquivo($arquivo)
    {
        if($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }

    }
}
