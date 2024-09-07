<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Organizador;
use App\Models\Participante;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'tipo_usuario' => 'required|in:participante,organizador',
            'eventos' => 'array', 
            'eventos.*' => 'exists:events,id',
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        if ($request->tipo_usuario === 'organizador') {
            Organizador::create(['user_id' => $user->id, 'nome_empresa' => $request->nome_empresa]);
        } else {
            $participante = Participante::create(['user_id' => $user->id]);

            if ($request->has('eventos')) {
                $participante->eventos()->attach($request->eventos);
            }
        }

        auth()->login($user);

        return redirect()->route('dashboard');
    }

}
