<x-layout>
    <div class="text-center text-3xl font-bold m-4 px-2 py-4 border-2 border-solid border-indigo-400 rounded">
        <h1>Saved Jobs</h1>
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        @forelse ($saved_jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>Your list is empty!</p>
        @endforelse
    </div>
   {{ $saved_jobs->links() }}
</x-layout>