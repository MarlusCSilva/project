<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class OrganizadorController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('organizador.index', compact('eventos'));
    }

    public function createEvent()
    {
        return view('organizador.criarEvento');
    }

        public function storeEvento(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required',
            'maximo_participantes' => 'required|integer',
            'status' => 'required',
            'categoria' => 'required',
        ]);

        $organizador = auth()->user()->organizador;
        $validated['organizador_id'] = $organizador->id;
        Evento::create($validated);
        return redirect()->route('organizador.index');
    }


    public function editarEvento($id)
    {
        $evento = Evento::findOrFail($id);
        return view('organizador.editarEvento', compact('evento'));
    }

    public function atualizarEvent(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
            'localizacao' => 'required',
            'numero_max_participantes' => 'required|integer',
            'status' => 'required',
            'categoria' => 'required',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update($validated);

        return redirect()->route('organizador.index');
    }

    public function deletarEvento($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('organizador.index');
    }
}
