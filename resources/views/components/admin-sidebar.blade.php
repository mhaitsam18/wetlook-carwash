<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <x-admin-navlink href="/admin/index" :active="request()->is('admin/index')" :icon="'bi bi-grid'">Dashboard</x-admin-navlink>

        <li class="nav-heading">Data User</li>
        <x-admin-navlink href="/admin/admin" :active="Str::startsWith(request()->path(), 'admin/admin')" :icon="'bi bi-person'">Data Admin</x-admin-navlink>
        <x-admin-navlink href="/admin/member" :active="Str::startsWith(request()->path(), 'admin/member')" :icon="'bi bi-people'">Data Member</x-admin-navlink>

        <li class="nav-heading">Data Pemesanan</li>
        <x-admin-navlink href="/admin/booking" :active="Str::startsWith(request()->path(), 'admin/booking')" :icon="'bi bi-book'">Data Booking</x-admin-navlink>
        <x-admin-navlink href="/admin/order" :active="Str::startsWith(request()->path(), 'admin/order')" :icon="'bi bi-bag'">Riwayat Pemesanan</x-admin-navlink>

        <li class="nav-heading">Data Master</li>
        <x-admin-navlink href="/admin/package" :active="Str::startsWith(request()->path(), 'admin/package')" :icon="'bi bi-box-seam'">Data Paket</x-admin-navlink>
        <x-admin-navlink href="/admin/product" :active="Str::startsWith(request()->path(), 'admin/product')" :icon="'bi bi-basket'">Data Produk</x-admin-navlink>
        <x-admin-navlink href="/admin/room" :active="Str::startsWith(request()->path(), 'admin/room')" :icon="'bi bi-building'">Data Ruang</x-admin-navlink>
    </ul>
</aside><!-- End Sidebar-->
