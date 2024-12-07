<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@props([
    'url' => '/jobs/create',
    'class' => 'bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300',
    'icon' => null
])

<a href="{{ $url }}" class="{{ $class }}">
    @if ($icon)
    <i class="fa fa-{{ $icon }}"></i> Create Job
    @endif
</a>