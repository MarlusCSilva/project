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
        $participante = auth()->user()->userable;

        // Debug: Verificar o que está sendo retornado por userable
        dd($participante);

        if (!$participante || !$participante instanceof Participante) {
            return redirect()->back()->with('error', 'Somente participantes podem se inscrever em eventos.');
        }

        if ($evento->participantes()->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'Você já está cadastrado neste evento.');
        }

        if ($evento->participantes->count() >= $evento->maximo_participantes) {
            return redirect()->back()->with('error', 'Número máximo de participantes excedido para esse evento.');
        }

        $participante->eventos()->attach($evento->id);

        return redirect()->route('participante.meusEventos')->with('success', 'Você se cadastrou neste evento com sucesso.');
    }





    public function meusEventos()
    {
        $userable = auth()->user()->userable;
        $eventos = $userable instanceof Participante ? $userable->eventos : collect();
        return view('participante.meusEventos', compact('eventos'));
    }
    


}
