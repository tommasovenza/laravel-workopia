{{-- Indexing Listings --}}
<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @foreach ($listings as $listing)
        <x-job-card :job="$listing" />
    @endforeach
    </div>

   {{ $listings->links() }}
</x-layout>