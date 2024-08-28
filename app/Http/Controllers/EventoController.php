<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('evento.index', compact('evento'));
    }

    public function create()
    {
        return view('evento.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required|string|max:255',
            'maximo_participantes' => 'required|integer',
            'categoria' => 'required|string|max:255',
        ]);

        Evento::create($validated + ['organizador_id' => auth()->id()]);

        return redirect()->route('evento.index')->with('success', 'Evento criado com sucesso.');
    }

    public function show(Evento $evento)
    {
        return view('evento.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        return view('evento.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required|string|max:255',
            'maximo_participantes' => 'required|integer',
            'categoria' => 'required|string|max:255',
        ]);

        $evento->update($validated);

        return redirect()->route('evento.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('evento.index')->with('success', 'Evento deletado com sucesso.');
    }
}
