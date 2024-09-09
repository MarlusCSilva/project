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
        $user = auth()->user();

        if ($user->tipo_usuario !== 'participante') {
            return redirect()->back()->with('error', 'Somente participantes podem se inscrever em eventos.');
        }

        $participante = $user->participante;
        if ($evento->participantes()->where('participante_id', $participante->id)->exists()) {
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

    $user = auth()->user();

    if ($user->userable instanceof \App\Models\Participante) {
        // Obtenha o participante e seus eventos relacionados
        $participante = $user->userable;

        // Verifique o relacionamento diretamente
        $eventos = $participante->eventos()->get();

        // Debug para ver o que está sendo retornado
        dd($eventos);

    } else {
        // Retorne uma coleção vazia se o usuário não for um participante
        $eventos = collect();
    }

    return view('participante.meusEventos', compact('eventos'));
}

}
