<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Participante;

class PagamentoController extends Controller
{
    public function processPayment(Request $request, Participante $participante)
    {
        $pagamento = new Pagamento([
            'participante_id' => $participante->id,
            'preco' => $participante->evento->preco,
            'status' => 'pending',
            'metodo_pagamento' => 'stripe',
        ]);

        // PAGAMENTO VIA STRIPE

        $pagamento->status = 'completed';
        $pagamento->save();

        return redirect()->route('registrations.show', $registration)->with('success', 'Pagamento efetuado com sucesso.');
    }

    public function historicoPagamento(User $user)
    {
        $pagamentos = $user->pagamentos;
        return view('pagamentos.history', compact('pagamentos'));
    }
}
