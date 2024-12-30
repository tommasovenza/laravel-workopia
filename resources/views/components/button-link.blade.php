<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@props([
    'url' => '/',
    'class' => '',
    'hover' => '',
    'icon' => null
])

<a href="{{ $url }}" class="{{ $class }} {{ $hover }}">
    {{-- If Icon Exist --}}
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i> 
    @endif
    {{ $slot }}
</a>