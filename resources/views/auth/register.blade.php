<x-guest-layout>
    <!-- Nav Tabs para alternar entre Participante e Organizador -->
    <ul class="nav nav-tabs" id="registerTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="participante-tab" data-bs-toggle="tab" href="#participante" role="tab" aria-controls="participante" aria-selected="true">Participante</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="organizador-tab" data-bs-toggle="tab" href="#organizador" role="tab" aria-controls="organizador" aria-selected="false">Organizador</a>
        </li>
    </ul>

    <!-- Conteúdo das Abas -->
    <div class="tab-content" id="registerTabContent">
        <!-- Formulário de Participante -->
        <div class="tab-pane fade show active" id="participante" role="tabpanel" aria-labelledby="participante-tab">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Campo Oculto para Tipo de Usuário -->
                <input type="hidden" name="tipo_usuario" value="participante">

                <!-- Nome -->
                <div class="mt-4">
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmar Senha -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Formulário de Organizador -->
        <div class="tab-pane fade" id="organizador" role="tabpanel" aria-labelledby="organizador-tab">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Campo Oculto para Tipo de Usuário -->
                <input type="hidden" name="tipo_usuario" value="organizador">

                <!-- Nome -->
                <div class="mt-4">
                    <x-input-label for="nome" :value="__('Nome')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Nome da Empresa -->
                <div class="mt-4">
                    <x-input-label for="nome_empresa" :value="__('Nome da Empresa')" />
                    <x-text-input id="nome_empresa" class="block mt-1 w-full" type="text" name="nome_empresa" :value="old('nome_empresa')" required autocomplete="organization" />
                    <x-input-error :messages="$errors->get('nome_empresa')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmar Senha -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</x-guest-layout>
