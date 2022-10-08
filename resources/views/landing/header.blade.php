<header class="header">
    @include('auth.modals.modal-register')
    @include('auth.modals.modal-login')
    @include('auth.modals.modal-forgot-password')
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg bg-black lg:bg-transparent">
            <div class="container-fluid px-lg-5">
                <a class="navbar-brand" href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-white"/>
                    {{--                    <img src="/images/hardcore-fc-logo.svg" alt="logo">--}}
                </a>
                <div class="mobile-menu-right">
                    <a href="#" class="mobile-search-btn search-box-outer"><i class="far fa-search"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="far fa-stream"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <div class="">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Бойцы</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Расписание</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Турниры</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Лиги</a>
                                <ul class="dropdown-menu fade-up">
                                    <li><a class="dropdown-item" href="#">Hardcore FC</a></li>
                                    <li><a class="dropdown-item" href="#">Hardcore MMA</a></li>
                                    <li><a class="dropdown-item" href="#">Hardcore Boxing</a></li>
                                </ul>
                            </li>
                        </ul>
                        <li class="nav-item lg:hidden border-top border-t-gray-100">
                            @auth
                                <!-- Settings Dropdown -->
                                <div class="flex items-center py-2">
                                    <div
                                        class="flex items-center text-base font-medium duration-150 ease-in-out mr-3 ">
                                        <div>{{ Auth::user()->name }}</div>
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="nav-link" href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            @else
                                <div class=" py-2">
                                    <a class="theme-btn text-white" data-bs-target="#loginModal" data-bs-toggle="modal">Войти<i
                                            class="far fa-arrow-right"></i></a>
                                </div>
                            @endauth
                        </li>
                    </div>

                    <div class="header-nav-right">
                        <div class="header-nav-search">
                            <a href="#" class="search-box-outer"><i class="far fa-search"></i></a>
                        </div>
                        @auth
                            <!-- Settings Dropdown -->
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="flex items-center text-base  font-medium text-white hover:text-gray-100 hover:border-gray-300 focus:outline-none  focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <div class="">
                                <a class="theme-btn text-white" data-bs-target="#loginModal" data-bs-toggle="modal">Войти<i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
