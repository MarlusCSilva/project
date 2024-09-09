<div class="d-flex justify-content-between bg-dark text-light" style="max-height: 85px;">
    <div class="justify-start text-center">
        <x-application-logo />
    </div>
    @if (Route::has('login'))
        <div class="d-flex flex-grow-1 justify-content-center">
            <nav class="mx-3 d-flex align-items-center">
                @auth
                    @if (Auth::user()->tipo_usuario == 'participante')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('eventos')" :active="request()->routeIs('eventos')">
                            {{ __('Eventos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('participante.meusEventos')" :active="request()->routeIs('participante.meusEventos')">
                            {{ __('Meus Eventos') }}
                        </x-nav-link>
                    @elseif (Auth::user()->tipo_usuario == 'organizador')
                        <x-nav-link :href="route('organizador.index')" :active="request()->routeIs('organizador.index')">
                            {{ __('Meus Eventos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('organizador.criarEvento')" :active="request()->routeIs('organizador.criarEvento')">
                            {{ __('Criar Evento') }}
                        </x-nav-link>
                    @endif

                @else
                    <a href="{{ route('login') }}"
                        class="bg-light text-dark p-2 rounded-md m-2 fs-6 text-decoration-none fw-bold d-none d-md-block">
                        <span><i class="bi bi-box-arrow-in-right"></i></span>
                        <span>Sign In</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-light text-dark p-2 rounded-md m-2 fs-6 text-decoration-none fw-bold d-none d-md-block">
                            <i class="bi bi-person-add"></i>
                            <span>Sign Up</span>
                        </a>
                    @endif
                    <button class="btn btn-light d-block d-md-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                        <i class="bi bi-list"></i>
                    </button>
                @endauth
            </nav>
        </div>

        <div class="d-flex align-items-center ms-auto mx-3">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-light dark:text-gray-400 bg-black dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        @if (Auth::check())
                            <i class="bi bi-person-fill"></i>
                        @endif
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    @auth
                        <div class="d-flex align-items-center px-4 py-2 text-dark border-bottom">
                            <i class="bi bi-person-fill me-2"></i> <!-- Ícone com margem à direita -->
                            <p class="mb-0">{{ Auth::user()->username }}</p> <!-- Texto sem margem inferior -->
                        </div>
                        <x-dropdown-link class="" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @endauth
                </x-slot>
            </x-dropdown>
        </div>
    @endif
</div>
