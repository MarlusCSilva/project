<div class="d-flex p-3 bg-dark text-light">
    <div class="flex-1 text-center">
        <x-application-logo />
    </div>
    @if (Route::has('login'))
        <nav class="mx-3 flex justify-end align-items-center m-2">
            @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <!-- DropDown Profile -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-light dark:text-gray-400 bg-black dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @if (Auth::check())
                                    <div>{{ Auth::user()->nome }}</div>
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
                            @Auth
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log Out') }}</x-dropdown-link>
                                </form>
                            @endauth
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <!-- Botões "Sign In" e "Sign Up" para telas maiores -->
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

                <!-- Botão de menu para telas menores -->
                <button class="btn btn-light d-block d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    <i class="bi bi-list"></i>
                </button>
            @endauth
        </nav>
    @endif
</div>

<!-- Offcanvas para "Sign In" e "Sign Up" -->
<div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-3">
            <span><i class="bi bi-box-arrow-in-right"></i></span>
            <span>Sign In</span>
        </a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-secondary w-100">
                <i class="bi bi-person-add"></i>
                <span>Sign Up</span>
            </a>
        @endif
    </div>
</div>