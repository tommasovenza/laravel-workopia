{{-- Indexing Listings --}}
<x-layout>
    <div class="text-center text-3xl font-bold m-4 px-2 py-4 border-2 border-solid border-indigo-400 rounded">
        <h1 class="">All Jobs</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @foreach ($listings as $listing)
            <x-job-card :job="$listing" />
        @endforeach
    </div>

   {{ $listings->links() }}
</x-layout>