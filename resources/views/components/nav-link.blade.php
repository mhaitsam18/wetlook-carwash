@props(['active' => false, 'dropdown' => false, 'submenus' => false])
<li class="{{ $dropdown }}">
    <a {{ $attributes }} class="{{ $active ? 'active' : '' }} main-menu-link"
        aria-current="{{ $active ? 'page' : false }} ">{{ $slot }}
        {!! $dropdown ? '<i class="fa fa-angle-down"></i>' : '' !!}</a>
    @if ($dropdown)
        <ul class="sub-menu">
            @if ($slot == 'Pesanan Saya')
                @foreach ($submenus as $submenu)
                    <li><a href="{{ $submenu['href'] }}">{{ $submenu['slot'] }}</a></li>
                @endforeach
            @endif
        </ul>
    @endif
</li>
