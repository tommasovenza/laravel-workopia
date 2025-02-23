<x-layout>
    <h1 class="text-3xl text-centered px-2 -py-4">Saved Jobs</h1>
    @foreach ($saved_jobs as $job)
        <x-job-card :job="$job" />
    @endforeach
   {{-- {{ $saved_jobs->links() }} --}}
</x-layout>