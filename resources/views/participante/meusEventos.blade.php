@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@include('partials.header')

<div class="m-5 p-5">
    <h1>Meus Eventos</h1>
    @if($eventos->isEmpty())
        <h2>Olá senhor(a) {{ Auth::user()->nome }}</h2>
        <p>No momento, não existe vínculo da sua conta com os eventos do nosso site! Recomendamos que o senhor busque 
        eventos de seu interesse e após isso poderá se cadastrar e visualizar os eventos nesta área.</p>
        <p>A equipe EventFlow agradece e desejamos uma ótima navegação.</p>
    @else
        <ul>
            @foreach($eventos as $evento)
                <li>
                    <strong>{{ $evento->nome }}</strong><br>
                    Data: {{ $evento->data }}<br>
                    Local: {{ $evento->localizacao }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
