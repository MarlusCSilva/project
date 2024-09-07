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
        <form action="{{ route('organizador.storeEvento') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Evento</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" id="data" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" required>
            </div>
            <div class="form-group">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" name="localizacao" id="localizacao" required>
            </div>
            <div class="form-group">
                <label for="maximo_participantes">Número Máximo de Participantes</label>
                <input type="number" class="form-control" name="maximo_participantes" id="maximo_participantes" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Salvar</button>
        </form>
    </div>
</x-app-layout>
