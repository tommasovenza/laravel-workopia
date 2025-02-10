<x-layout>
    <h1 class="text-2xl">Dashboard</h1>
    <div class="area bg-white rounded p-4 mt-4">
        <div class="container">
        @forelse ($jobs as $job)
            <div class="job-row flex justify-between items-center m-4">
                <div class="job-title">
                    {{$job->title}}
                </div>
                <div class="controls flex items-center gap-4">
                    {{-- Edit Button --}}
                    <div class="edit-btn">
                        <a href="{{route('edit', $job->id)}}" class="block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded">Edit</a>
                    </div>
                    {{-- Delete Button --}}
                    <div class="delete-btn">
                        <form method="POST" action="{{route('destroy', $job)}}?from-dashboard=yes" onsubmit="return confirm('Are you sure that you want to delete this job?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No Jobs Found!</p>
        @endforelse
            </div>
        </div>
    </div>
</x-layout>