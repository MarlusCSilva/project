<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Evento') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Criar Evento</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('organizador.atualizarEvento', $evento) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $evento->nome }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao">{{ $evento->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" id="data" value="{{ $evento->data }}">
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" value="{{ $evento->hora }}">
            </div>
            <div class="form-group">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" name="localizacao" id="localizacao"
                    value="{{ $evento->localizacao }}">
            </div>
            <div class="form-group">
                <label for="maximo_participantes">Número Máximo de Participantes</label>
                <input type="number" class="form-control" name="maximo_participantes" id="maximo_participantes"
                    value=" {{ $evento->maximo_participantes }} ">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" value="{{ $evento->status }}">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                    <option value="cancelado">Cancelado</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" value="{{ $evento->categoria }}">
            </div>
            <div class="form-group">
                <label for="url">Arquivo</label>
                <input type="file" class="form-control" name="arquivo" id="arquivo">
                @if ($evento->arquivo)
                <a href="{{ asset($evento->arquivo) }}" target="_blank">Ver arquivo atual</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>