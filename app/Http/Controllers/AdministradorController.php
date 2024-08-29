<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Evento;

class AdministradorController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $eventos = Evento::all();
        return view('admin.dashboard', compact('users', 'eventos'));
    }

    public function gerenciarUsers()
    {
        $users = User::all();
        return view('admin.gerenciar_users', compact('users'));
    }

    public function editarUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function atualizarUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update($validated);

        return redirect()->route('admin.gerenciarUsers')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function deletarUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.gerenciarUsers')->with('success', 'Usuário deletado com sucesso.');
    }

    public function configuracoesSite()
    {
        return view('admin.configuracoes_site');
    }

    public function atualizarConfiguracoesSite(Request $request)
    {
        return redirect()->route('admin.dashboard')->with('success', 'Configurações do site configuradas com sucesso.');
    }
}
