<nav>
    <ul>
        <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
        <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
    </ul>
</nav>
