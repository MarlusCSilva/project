<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Eventos') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class=>Lista de Eventos</h1>
        @if($eventos->isEmpty())
            <p>Não há eventos cadastrados.</p>
        @else
            <ul>
                @foreach($eventos as $evento)
                    <li>{{ $evento->nome }} - {{ $evento->data }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
