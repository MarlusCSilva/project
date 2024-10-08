@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@include('partials.header')

<div class="container mt-5">
    <h1 class="mb-5 text-center">Lista de Eventos</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($eventos->isEmpty())
        <div class="alert alert-warning text-center">
            Não há eventos cadastrados.
        </div>
    @else
        <div class="row">
            @foreach($eventos as $evento)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                    <img src="{{$evento->url}}" class="card-img-top" alt="...">  
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->nome }}</h5>
                            <p class="card-text">Data: {{ $evento->data }}</p>
                            <p class="card-text">Local: {{ $evento->localizacao}}</p>
                            <p class="card-text">Hora: {{ $evento->hora}}</p>
                            <p class="card-text">Descrição: {{ $evento->descricao}}</p>
                            <p class="card-text">Status: {{ $evento->status}}</p>
                            <p class="card-text">Numeros de Participantes: {{ $evento->maximo_participantes}}</p>
                            <form action="{{ route('participante.participarEvento', $evento->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Inscrever-se</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
