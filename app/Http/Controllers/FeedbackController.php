<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Evento;

class FeedbackController extends Controller
{
    public function store(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'nota_evento' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        Feedback::create([
            'evento_id' => $evento->id,
            'user_id' => auth()->id(),
            'nota_evento' => $validated['nota_evento'],
            'comentario' => $validated['comentario'],
        ]);

        return redirect()->route('evento.show', $evento)->with('success', 'Feedback publicado com sucesso.');
    }
}
