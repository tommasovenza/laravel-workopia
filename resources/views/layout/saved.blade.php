<x-layout>
    <h1 class="text-3xl text-centered px-2 py-4">Saved Jobs</h1>
    <div class="grid lg:grid-cols-3 gap-4">
        @forelse ($saved_jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>Your list is empty!</p>
        @endforelse
    </div>
   {{ $saved_jobs->links() }}
</x-layout>