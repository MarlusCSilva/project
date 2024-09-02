<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class HomeController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();

        return view('home', compact('eventos'));
    }
}
