<nav class="p-4 flex items-center justify-between">
    <ul class="flex items-center">
        <li>
            <a href="/" class="pe-3 nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house{{ request()->routeIs('home') ? '-fill' : '' }}"></i>
                Home
            </a>
        </li>
        @auth
            <li>
                <a href="{{ route('dashboard') }}"
                    class=" nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-line{{ request()->routeIs('dashboard') ? '-fill' : '' }}"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endauth

        <li>
            <a href="{{ route('posts.index') }}"
                class="p-3 nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                <i class="bi bi-stickies{{ request()->routeIs('posts.index') ? '-fill' : '' }}"></i>
                <span>Posts</span>
            </a>
        </li>
    </ul>

    <ul class="flex items-center">
        @auth
            <li>
                <a href="{{ route('users.show', auth()->user()) }}"
                    class="p-3  nav-link {{ request()->routeIs('users.show') ? 'active' : '' }}">Welcome Back <span
                        class="font-bold underline">{{ auth()->user()->name }}</span></a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                    @csrf
                    <button type="submit" class="ps-3">
                        <span>Logout</span>
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
                </form>
            </li>
        @endauth

        @guest
            <li>
                <a href="{{ route('login') }}"
                    class="p-3 nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}"
                    class="ps-3 nav-link {{ request()->routeIs('register') ? 'active' : '' }} btn-primary">Register</a>
            </li>
        @endguest
    </ul>
</nav>
