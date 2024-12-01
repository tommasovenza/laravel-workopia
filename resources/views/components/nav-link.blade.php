@props(['url' => '/', 'active' => false, 'icon' => null])

<a href="{{ $url }}" class="text-white hover:underline py-2 {{ $active ? 'font-bold text-yellow-500' : '' }}">
    {{-- @if ($icon)
        <i class="fa fa-{{ $icon }} mr-1">
    @endif --}}
    {{ $slot }}
</a>