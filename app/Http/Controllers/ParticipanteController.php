<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Evento;
use Illuminate\Support\Str;

class ParticipanteController extends Controller
{
    public function store(Request $request, Evento $evento)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
        ]);

        $participante = new Participante([
            'user_id' => auth()->id(),
            'evento_id' => $evento->id,
            'ticket' => Str::random(10),
        ]);

        $participante->save();

        return redirect()->route('evento.show', $evento->id)->with('success', 'Você se cadastrou nesse evento com sucesso.');
    }

    public function show(Participante $participante)
    {
        return view('participante.show', compact('participante'));
    }
}
