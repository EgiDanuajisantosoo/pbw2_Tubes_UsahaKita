<nav class="fixed top-0 left-0 w-full bg-white border-b border-gray-200 z-50 light:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src=" {{ asset('img/logo_Usahakita.png') }}" style="width: 150px;height:130px" class="h-10 absolute"
                alt="Logo" />
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap light:text-white">Flowbite</span> --}}
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-300 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 light:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full" src="{{ asset('img/defaultProfil.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow light:bg-gray-700 light:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    @if (Auth::check())
                        <span
                            class="block text-sm text-gray-900 light:text-white text-center">{{ Auth::user()->nama_depan }}</span>
                        <span
                            class="block text-sm text-gray-500 truncate light:text-gray-400">{{ Auth::user()->email }}</span>
                    @else
                        <span class="block text-sm text-gray-900 light:text-white">Hallo Guest</span>
                        <span class="block text-sm text-gray-500 truncate light:text-gray-400">guest@gmail.com</span>
                    @endif
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    @if (Auth::check())
                        <li><a href="/profile/{{ Auth::id() }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">Profile</a>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 2)
                        <li><a href="/dashboardBusinesman"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">Dashboard</a>
                        </li>
                    @endif
                    @if (Auth::check())
                        @if (Auth::user()->role == 3)
                            <li><a href="/verifikasiLowongan"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">Aktivitas</a>
                        @endif
                        </li>
                        <li><a href="settingAkun"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">Settings</a>
                        </li>
                    @endif
                    @if (!Auth::check())
                        <li><a href="/login"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white text-center">Login</a>
                        </li>
                        <li><a href="/register"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white text-center">Register</a>
                        </li>
                    @endif
                    @if (Auth::check())
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white w-full border-t-2 border-gray-100 mt-2">
                                    Sign out
                                </button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 light:text-gray-400 light:hover:bg-gray-700 light:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="false" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white light:bg-gray-800 md:light:bg-gray-900 light:border-gray-700">
                <li>
                    <a href="/lowonganBisnis"
                        class="relative py-2 px-3 rounded {{ request()->is('lowonganBisnis') || request()->is('detailLowonganBisnis') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group"
                        aria-current="page">
                        Lowongan Bisnis
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('lowonganBisnis') || request()->is('detailLowonganBisnis') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>
                <li>
                    <a href="/perusahaan"
                        class="relative py-2 px-3 rounded {{ request()->is('perusahaan') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
                        Perusahaan
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('perusahaan') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>
                <li>
                    <a href="/aboutUs"
                        class="relative py-2 px-3 rounded {{ request()->is('aboutUs') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
                        About Us
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('aboutUs') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
