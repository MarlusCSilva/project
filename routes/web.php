<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::post('/evento/{evento}/participar', [ParticipanteController::class, 'store'])->name('participante.store');
    Route::get('/participante/{participante}', [ParticipanteController::class, 'show'])->name('participante.show');
    Route::get('/eventos/avaliar', [ParticipanteController::class, 'avaliarEventos'])->name('participante.avaliarEventos');
    Route::post('/evento/{evento}/participar', [ParticipanteController::class, 'participarEvento'])->name('participante.participarEvento');
    Route::get('/meus-eventos', [ParticipanteController::class, 'meusEventos'])->name('participante.meusEventos');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdministradorController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/usuarios', [AdministradorController::class, 'gerenciarUsers'])->name('admin.gerenciarUsers');
    Route::get('/admin/usuarios/{user}/editar', [AdministradorController::class, 'editarUser'])->name('admin.editarUser');
    Route::put('/admin/usuarios/{user}', [AdministradorController::class, 'atualizarUser'])->name('admin.atualizarUser');
    Route::delete('/admin/usuarios/{user}', [AdministradorController::class, 'deletarUser'])->name('admin.deletarUser');
    Route::get('/admin/configuracoes', [AdministradorController::class, 'configuracoesSite'])->name('admin.configuracoesSite');
    Route::post('/admin/configuracoes', [AdministradorController::class, 'atualizarConfiguracoesSite'])->name('admin.atualizarConfiguracoesSite');
});

Route::middleware(['auth', 'organizador'])->group(function () {
    Route::get('/organizador/eventos', [OrganizadorController::class, 'index'])->name('organizador.index');
    Route::get('/organizador/eventos/criar', [OrganizadorController::class, 'createEvent'])->name('organizador.createEvent');
    Route::post('/organizador/eventos', [OrganizadorController::class, 'storeEvento'])->name('organizador.storeEvento');
    Route::get('/organizador/eventos/{evento}/editar', [OrganizadorController::class, 'editarEvento'])->name('organizador.editarEvento');
    Route::put('/organizador/eventos/{evento}', [OrganizadorController::class, 'atualizarEvent'])->name('organizador.atualizarEvent');
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
