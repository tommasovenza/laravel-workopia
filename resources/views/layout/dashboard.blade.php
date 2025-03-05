<x-layout>
    {{-- Section --}}
    <section id="dashboard" class="flex flex-col md:flex-row gap-4">
        {{-- Profile Area --}}
        <div class="profile w-full bg-white rounded p-4 mt-4">
            <h3 class="text-3xl text-center">Profile</h3>

            @if ($user->avatar)
            <div class="image-container flex justify-center m-4">
                <img class="h-48 w-48 object-cover rounded-full" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
            </div>
            @endif

            {{-- Update profile --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Input Name --}}
                <x-inputs.text id="name" name="name" value="{{ $user->name }}" />
                {{-- Input Email --}}
                <x-inputs.text id="email" type="email" name="email" value="{{ $user->email }}" />
                {{-- Input File --}}
                <x-inputs.text id="avatar" type="file" name="avatar" label="avatar" />
                {{-- Button Submit --}}
                <button 
                    type="submit" 
                    class="bg-green-500 hover:bg-green-600 rounded text-sm text-white p-2 w-full">Update
                </button>
            </form>
        </div>
        {{-- Job listing Area Index --}}
        <div class="job-area w-full bg-white rounded p-4 mt-4">
            <h3 class="text-3xl text-center mb-10">My Job Listing</h3>
            {{-- Container --}}
            <div class="container">
                @forelse ($jobs as $job)
                {{-- Create Job Row --}}
                <div class="job-row flex justify-between items-center m-4">
                    {{-- Job Title --}}
                    <div class="job-title text-lg">
                        <p>{{$job->title}}</p>
                    </div>
                    {{-- Control Buttons --}}
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

                {{-- Printing applicants if found --}}
                <div class="applicants-wrapper">
                @forelse ($job->applicants as $index => $applicant)
                    <div class="applicant-info m-4 bg-gray-100 p-2 rounded">
                        <h3><strong>Applicant</strong> Number {{ $index+1 }}</h3>
                        <ul class="applicant-details-list">
                            <li><strong>Name: </strong>{{ $applicant->full_name }}</li>
                            <li><strong>Email: </strong>{{ $applicant->contact_email }}</li>
                            <li><strong>Phone Number: </strong>{{ $applicant->contact_phone }}</li>
                            <li><strong>Location: </strong>{{ $applicant->location }}</li>
                            <li class="mt-2"><a class="text-blue-500 hover:text-blue-600" href="{{ asset('storage/'. $applicant->resume_path) }}" download><i class="fa-solid fa-download"></i> Download</a></li>

                            <li class="mt-2">
                                <form action="{{ route('applicant.destroy', $applicant->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @empty  
                    <p class="m-4 text-gray-500">No applicants found!</p>
                @endforelse
            </div>
            @empty
                <p class="m-4">No Jobs Found!</p>
            @endforelse
            </div>
        </div>
    </section>{{-- Section End --}}

    {{-- Include Bottom Banner --}}
    <x-bottom-banner />{{-- End --}}
</x-layout>