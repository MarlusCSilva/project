<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Evento;

class OrganizadorController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('organizador.index', compact('eventos'));
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
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
            'arquivo' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('arquivo')) {
            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
            $validated['url'] = Storage::url($arquivoPath);
        }

        $organizador = auth()->user()->organizador;
        $validated['organizador_id'] = $organizador->id;
        Evento::create($validated);
        return redirect()->route('organizador.index');
    }

    public function editarEvento($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.editarEvento', compact('evento'));
    }

    public function atualizarEvento(Request $request, $id)
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
            'arquivo' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
