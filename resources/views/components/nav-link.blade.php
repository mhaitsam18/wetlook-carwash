@props(['active' => false])
<li>
    <a {{ $attributes }} class="{{ $active ? 'active' : '' }} main-menu-link" aria-current="{{ $active ? 'page' : false }} ">{{ $slot }}</a>
</li>
