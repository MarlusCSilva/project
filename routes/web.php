<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministradorController;  

Route::get('/', function () {
    return view('welcome');
});
Route::get('/gerar-pdf', [PdfController::class, 'gerarPDF']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('eventos', [EventoController::class, 'index'])->name('eventos');

Route::middleware(['auth'])->group(function () {
    Route::post('/evento/{evento}/participar', [ParticipanteController::class, 'store'])->name('participante.store');
    Route::get('/participante/{participante}', [ParticipanteController::class, 'show'])->name('participante.show');
    Route::get('/eventos/avaliar', [ParticipanteController::class, 'avaliarEventos'])->name('participante.avaliarEventos');
    Route::post('/evento/{evento}/participar', [ParticipanteController::class, 'participarEvento'])->name('participante.participarEvento');
    Route::get('/meus-eventos', [ParticipanteController::class, 'meusEventos'])->name('participante.meusEventos');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/organizador/eventos', [OrganizadorController::class, 'index'])->name('organizador.index');
    Route::get('/organizador/eventos/criar', [OrganizadorController::class, 'createEvent'])->name('organizador.criarEvento');
    Route::get('/organizador/eventos/{evento}', [OrganizadorController::class, 'show'])->name('organizador.showEvento');
    Route::post('/organizador/eventos', [OrganizadorController::class, 'storeEvento'])->name('organizador.storeEvento');
    Route::get('/organizador/eventos/{evento}/editar', [OrganizadorController::class, 'editarEvento'])->name('organizador.editarEvento');
    Route::put('/organizador/eventos/{evento}/atualizar', [OrganizadorController::class, 'atualizarEvento'])->name('organizador.atualizarEvento');
    Route::delete('/organizador/eventos/{evento}', [OrganizadorController::class, 'deletarEvento'])->name('organizador.deletarEvento');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
