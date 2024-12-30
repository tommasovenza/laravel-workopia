@props([
    'url' => '/', 
    'active' => false, 
    'icon' => null,
    'mobile' => false,
    'block' => false,
])


@if ($mobile)
<a href="{{ $url }}" class="text-white hover:underline py-2 {{ $active ? 'font-bold text-yellow-500' : '' }} {{ $block ? 'block' : '' }}">
    {{-- If Icon Exist --}}
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i> 
    @endif
    {{ $slot }}
</a>
@else
<a href="{{ $url }}" class="text-white hover:underline py-2 {{ $active ? 'font-bold text-yellow-500' : '' }}">
    {{-- @if ($icon)
        <i class="fa fa-{{ $icon }} mr-1">
    @endif --}}
    {{ $slot }}
</a>
@endif