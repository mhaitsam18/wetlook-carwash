@props(['wide'])
<nav>
    <ul>
        <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
        @can('member')
            <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
        @endcan
        @guest
            <x-nav-link href="/register" :active="request()->is('register')">Registrasi</x-nav-link>
            @if ($wide)
                <li class="float-right">
                    <a href="/login">
                        <i class="fa fa-sign-in"></i> Log in
                    </a>
                </li>
            @else
                <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            @endif
        @endguest
    </ul>
</nav>
