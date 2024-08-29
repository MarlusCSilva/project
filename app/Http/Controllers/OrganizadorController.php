<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class OrganizadorController extends Controller
{
    public function index()
    {
        $eventos = auth()->user()->userable->eventos;
        return view('organizador.eventos.index', compact('eventos'));
    }

    public function createEvent()
    {
        return view('organizador.eventos.create');
    }

    public function storeEvento(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required|string|max:255',
            'maximo_participantes' => 'required|integer',
            'status' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
        ]);

        $evento = new Evento($validated);
        auth()->user()->userable->eventos()->save($evento);

        return redirect()->route('organizador.index')->with('success', 'Evento criado com sucesso.');
    }

    public function editarEvento(Evento $evento)
    {
        return view('organizador.eventos.edit', compact('evento'));
    }

    public function atualizarEvent(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required|string|max:255',
            'maximo_participantes' => 'required|integer',
            'status' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('organizador.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function deletarEvento(Evento $evento)
    {
        $event->delete();

        return redirect()->route('organizador.index')->with('success', 'Evento deletado com sucesso.');
    }
}