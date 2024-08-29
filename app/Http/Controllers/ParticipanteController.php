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

    public function avaliarEventos()
    {
        $events = Evento::all();
        return view('participante.eventos.available', compact('events'));
    }

    public function participarEvento(Evento $evento)
    {
        if ($evento->participante()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('participante.availableEvents')->with('error', 'Você já está cadastrado neste evento.');
        }

        if ($evento->participante->count() >= $evento->maximo_participantes) {
            return redirect()->route('participante.availableEvents')->with('error', 'Número máximo de participantes excedido para esse evento.');
        }

        $registration = new Participantes([
            'user_id' => auth()->id(),
            'evento_id' => $event->id,
            'ticket' => str_random(10),
        ]);

        $registration->save();

        return redirect()->route('participante.meusEventos')->with('success', 'You are successfully registered for the event.');
    }

    public function meusEventos()
    {
        $participante = auth()->user()->polimorfismo->participante;
        return view('participante.participante.index', compact('participante'));
    }
}
