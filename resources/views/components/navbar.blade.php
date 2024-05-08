@props(['wide'])
@php
    $submenu = [
        'pesanan-saya' => [
            [
                'href' => 'bookings',
                'slot' => 'Bookingan Saya',
            ],
            [
                'href' => 'history',
                'slot' => 'Histori Pemesanan',
            ],
        ],
    ];
@endphp
<nav>
    <ul>
        <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
        @can('member')
            <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
            <x-nav-link href="#" :active="request()->is('orders/*')" :dropdown="'has-dropdown'" :submenus="$submenu['pesanan-saya']">Pesanan Saya</x-nav-link>
            <x-nav-link href="/my-profile" :active="request()->is('my-profile')">Profil Saya</x-nav-link>
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
        @auth
            @if ($wide)
                <li class="float-right">
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            @else
                <x-nav-link href="/logout" :active="request()->is('logout')">Log Out</x-nav-link>
            @endif
        @endauth
    </ul>
</nav>
