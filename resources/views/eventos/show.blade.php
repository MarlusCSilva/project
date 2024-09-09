<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evento') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg md:flex">
                @if($evento->url)
                <div class="md:w-1/2">
                    <img src="{{ asset($evento->url) }}" alt="Imagem do Evento" class="object-cover w-full h-full rounded-l-lg">
                </div>
                @endif

                <div class="md:w-1/2 p-6">
                    <div class="text-lg font-bold mb-4">
                        Título do Evento - {{ $evento->nome }}
                    </div>
                    <p class="text-gray-600">Descrição do Evento:</p>
                    <p class="text-gray-800">{{ $evento->descricao }}</p>

                    <p class="text-gray-600 mt-4">Data do Evento:</p>
                    <p class="text-gray-800">{{ $evento->data }}</p>

                    <p class="text-gray-600 mt-4">Horário do Evento:</p>
                    <p class="text-gray-800">{{ $evento->hora }}</p>

                    <p class="text-gray-600 mt-4">Localização do Evento:</p>
                    <p class="text-gray-800">{{ $evento->localizacao }}</p>

                    <p class="text-gray-600 mt-4">Máximo de Participantes:</p>
                    <p class="text-gray-800">{{ $evento->maximo_participantes }}</p>

                    <p class="text-gray-600 mt-4">Status do Evento:</p>
                    <p class="text-gray-800">{{ $evento->status }}</p>

                    <p class="text-gray-600 mt-4">Categoria do Evento:</p>
                    <p class="text-gray-800">{{ $evento->categoria }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
