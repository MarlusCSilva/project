<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1 class="mb-4">Eventos</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('home') }}" class="btn btn-primary mb-3">Visualizar Tela de Apresentação</a>
        <a href="{{ route('home') }}" class="btn btn-primary mb-3">Gerar relatório</a>
        

        @if($eventos->count())
            <table class="table table-hover table-striped table-bordered text-center align-middle mt-2">
                <thead class="thead-dark">
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Localização</th>
                        <th>Máximo de Participantes</th>
                        <th>Status</th>
                        <th>Categoria</th>
                        <th>URL</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nome }}</td>
                            <td>{{ $evento->descricao }}</td>
                            <td>{{ $evento->data }}</td>
                            <td>{{ $evento->hora }}</td>
                            <td>{{ $evento->localizacao }}</td>
                            <td>{{ $evento->maximo_participantes }}</td>
                            <td>
                                <span class="badge 
                                    @if($evento->status == 'ativo') bg-success 
                                    @elseif($evento->status == 'cancelado') bg-danger 
                                    @elseif($evento->status == 'finalizado') bg-secondary 
                                    @else bg-warning @endif">
                                    {{ ucfirst($evento->status) }}
                                </span>
                            </td>
                            <td>{{ $evento->categoria }}</td>
                            <td>
                                @if($evento->url)
                                    <a href="{{ $evento->url }}" class="btn btn-link text-decoration-none" target="_blank">
                                        <i class="bi bi-link-45deg"></i> Ver
                                    </a>
                                @else
                                    <span class="text-muted">Sem URL</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('organizador.deletarEvento', $evento->id) }}" method="post">
                                    <a class="btn btn-info btn-sm" href="{{ route('organizador.showEvento', $evento->id) }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('organizador.editarEvento', $evento->id) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-warning">Nenhum Evento cadastrado</p>
        @endif
    </div>
</x-app-layout>
