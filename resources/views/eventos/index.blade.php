@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@include('partials.header')
<h1 class="mt-5 p-5">Lista de Eventos</h1>

@if($eventos->isEmpty())
    <p>Não há eventos cadastrados.</p>
@else
    <ul>
        @foreach($eventos as $evento)
            <li>{{ $evento->nome }} - {{ $evento->data }}</li>
        @endforeach
    </ul>
@endif