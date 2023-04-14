<nav class="bg-white dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between p-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <span
                class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name') }}</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="nav-link block py-2 pl-3 pr-4 {{ request()->routeIs('home') ? 'active' : 'unactive' }}">
                        <i class="bi bi-house{{ request()->routeIs('home') ? '-fill' : '' }}"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts.index') }}"
                        class="nav-link block py-2 pl-3 pr-4 {{ request()->routeIs('posts.index') ? 'active' : 'unactive' }}">
                        <i class="bi bi-stickies{{ request()->routeIs('posts.index') ? '-fill' : '' }}"></i>
                        <span>Posts</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="nav-link block py-2 pl-3 pr-4 {{ request()->routeIs('dashboard') ? 'active' : 'unactive' }}">
                            <i class="bi bi-bar-chart-line{{ request()->routeIs('dashboard') ? '-fill' : '' }}"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full nav-link block py-2 pl-3 pr-4 {{ request()->routeIs('users.show') ? 'active' : 'unactive' }}">
                            <span class="float-left">
                                <i class="bi bi-person{{ request()->routeIs('users.show') ? '-fill' : '' }}"></i>
                                Profile
                            </span>
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('users.show', auth()->user()) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <span>{{ '@' . auth()->user()->username }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form action="{{ route('logout') }}" method="post"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white cursor-pointer">
                                    @csrf
                                    <button type="submit" class="w-full">
                                        <span class="float-left">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="nav-link block py-2 pl-3 pr-4 {{ request()->routeIs('login') ? 'active' : 'unactive' }}">Signin</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
