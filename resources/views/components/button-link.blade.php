<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@props([
    'url' => '/',
    'class' => '',
    'hover' => '',
    'icon' => null,
    'block' => false,
])

<a href="{{ $url }}" class="{{ $class }} {{ $hover }} {{ $block ? 'block' : '' }}">
    {{-- If Icon Exist --}}
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i> 
    @endif
    {{ $slot }}
</a>