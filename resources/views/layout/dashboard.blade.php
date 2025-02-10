<x-layout>
    {{-- Section --}}
    <section class="flex flex-col md:flex-row gap-4">
        {{-- Profile Area --}}
        <div class="profile w-full bg-white rounded p-4 mt-4">
            <h3 class="text-3xl text-center mb-10">Profile</h3>
            {{-- Update profile --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Input Name --}}
                <x-inputs.text id="name" name="name" value="{{ $user->name }}" />
                {{-- Input Email --}}
                <x-inputs.text id="email" type="email" name="email" value="{{ $user->email }}" />

                <button type="submit" class="bg-green-500 hover:bg-green-600 rounded text-sm text-white p-2 w-full">Update</button>
            </form>
        </div>
        {{-- Job listing Area Index --}}
        <div class="job-area w-full bg-white rounded p-4 mt-4">
            <h3 class="text-3xl text-center mb-10">My Job Listing</h3>
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
    </section>
    {{-- Include Bottom Banner --}}
    <x-bottom-banner />
</x-layout>