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
        ]);

        $participante->save();

        return redirect()->route('evento.show', $evento->id)->with('success', 'Você se cadastrou nesse evento com sucesso.');
    }

    public function show(Participante $participante)
    {
        return view('participante.show', compact('participante'));
    }

    public function participarEvento(Evento $evento)
    {
        if ($evento->participantes()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('participante.participarEvents')->with('error', 'Você já está cadastrado neste evento.');
        }

        if ($evento->participantes->count() >= $evento->maximo_participantes) {
            return redirect()->route('participante.participarEvents')->with('error', 'Número máximo de participantes excedido para esse evento.');
        }

        $participante = new Participante([
            'user_id' => auth()->id(),
            'evento_id' => $evento->id,
        ]);

        $participante->save();

        return redirect()->route('participante.meusEventos')->with('success', 'Você se cadastrou neste evento com sucesso.');
    }

    public function meusEventos()
    {
        $userable = auth()->user()->userable;
        $eventos = $userable instanceof Participante ? $userable->eventos : collect();
        return view('participante.meusEventos', compact('eventos'));
    }
    


}
