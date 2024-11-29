{{-- Indexing Listings --}}
<x-layout>
    <ul>
    @foreach ($listings as $listing)
        <li>{{ $listing }}</li>
    @endforeach
    </ul>
</x-layout>