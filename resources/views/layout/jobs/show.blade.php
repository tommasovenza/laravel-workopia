<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Job Details Column -->
        <section class="md:col-span-3">
            <div class="rounded-lg shadow-md bg-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-blue-700" href="{{ route('index')}}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        Back To Listings
                    </a>
                    {{-- Check if User Can --}}
                    @can('update', $job)
                    <div class="flex space-x-3 ml-4">
                        <a href="{{ route('edit', $job->id)}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                            Edit
                        </a>
                        <!-- Delete Form -->
                        <form method="POST" action="{{route('destroy', $job->id)}}" onsubmit="return confirm('Are you sure that you want to delete this job?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                        <!-- End Delete Form -->
                    </div>
                    @endcan
                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold">
                        {{ $job->title }}
                    </h2>
                    <p class="text-gray-700 text-lg mt-2">
                        {{ $job->description }}
                    </p>
                    <ul class="my-4 bg-gray-100 p-4">
                        <li class="mb-2">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>
                        <li class="mb-2">
                            <strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}
                        </li>
                        <li class="mb-2">
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>
                        <li class="mb-2">
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                        </li>
                        <li class="mb-2">
                            <strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto p-4">
                <h2 class="text-xl font-semibold mb-4">Job Details</h2>
                <div class="rounded-lg shadow-md bg-white p-4">
                    @if ($job->requirements)
                        <h3 class="text-lg font-semibold mb-2 text-blue-500">Job Requirements</h3>
                        <p>{{ $job->requirements }}</p>
                    @endif
                    @if ($job->benefits)
                        <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                            Benefits
                        </h3>
                        <p>{{ $job->benefits }}</p>
                    @endif
                </div>
                <p class="my-5">
                    Put "Job Application" as the subject of your email
                    and attach your resume.
                </p>

                <div x-data="{ open: false }" x-cloak class="modal-form" >
                    <button x-on:click="open = true" class="block w-full text-center px-5 py-2.5 shadow-sm rounded font-medium cursor-pointer text-indigo-700 bg-indigo-200 hover:bg-indigo-400 hover:text-white">
                        Apply Now
                    </button>
                    {{-- Contents --}}
                    <div x-show="open" class="fixed inset-0 grid place-items-center bg-black bg-opacity-60 w-screen h-screen">
                        <div x-on:click.away="open = false" class="modal-inner bg-white w-[500px] p-8 rounded">
                            <h3 class="text-lg">Applicant for {{ $job->title }}</h3>
                            <form action="{{ route('applicant.store', $job->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Full Name --}}
                                <x-inputs.text id="full_name" name="full_name" label="Full Name" placeholder="Full Name" :required="true" />
                                {{-- Contact Phone --}}
                                <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Contact Phone" :required="true" />
                                {{-- Contact Email --}}
                                <x-inputs.text id="contact_email" type="email" name="contact_email" label="Contact Email" placeholder="Contact Email" :required="true" />
                                {{-- Message --}}
                                <x-inputs.text-area cols="3"
                                rows="3" id="message" placeholder="Message" name="message" label="Message" :required="true" />
                                {{-- Location --}}
                                <x-inputs.text id="location" name="location" label="Location" placeholder="Location" :required="true" />
                                {{-- Resume Path --}}
                                <x-inputs.text id="resume_path" type="file" name="resume_path" label="Resume Path" placeholder="Resume Path" :required="true" />
                                
                                {{-- Button Submit --}}
                                <div>
                                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <div id="map" class="map"></div>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white rounded-lg shadow-md p-3">
            <h3 class="text-xl text-center mb-4 font-bold">Company Info</h3>
            <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}" class="w-full rounded-lg mb-4 m-auto"/>
            
            <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>
            <p class="text-gray-700 text-lg my-3">
                {{ $job->company_description }}
            </p>
            <a href="{{ $job->company_website }}" target="_blank" class="text-blue-500">
                Visit Website
            </a>

            @guest
                <a class="mt-10 bg-gray-500 hover:bg-gray-600 text-white font-bold w-full  py-2 px-4 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-circle-info mr-2"></i> Login to save jobs
                </a>
            @endguest

            @auth
                @if (auth()->user()->markedJobs()->where('job_listing_id', $job->id)->exists())
                <form action="{{ route('bookmark.destroy', $job->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold w-full  py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i> Delete Bookmark
                    </button>
                </form>
                @else
                <form action="{{ route('bookmark.store', $job->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full  py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i> Bookmark Listing
                    </button>
                </form>
                @endif
            @endauth
        </aside>
    </div>

<link
  href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css"
  rel="stylesheet"
/>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Your Mapbox access token
    mapboxgl.accessToken = "{{ env('MAPBOX_API_KEY') }}";

    // Initialize the map
    const map = new mapboxgl.Map({
      container: 'map', // ID of the container element
      style: 'mapbox://styles/mapbox/streets-v11', // Map style
      center: [-74.5, 40], // Default center
      zoom: 9, // Default zoom level
    });

    // Get address from Laravel view
    const city = '{{ $job->city }}';
    const state = '{{ $job->state }}';
    const address = city + ', ' + state;

    const payload = {
        address: address,
    }

    const settings = {
        method: 'POST',
        body: JSON.stringify(payload),
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": '{{ csrf_token() }}',
            Accept: "application/json"
        },
    }

    // Geocode the address
    fetch('/geocode', settings)
      .then((response) => response.json())
      .then((data) => {
          console.log(data);
        if (data.features.length > 0) {
            
          const [longitude, latitude] = data.features[0].center;
          
          // Center the map and add a marker
          map.setCenter([longitude, latitude]);
          map.setZoom(14);

          new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        } else {
          console.error('No results found for the address.');
        }
      })
      .catch((error) => console.error('Error geocoding address:', error));
  });
</script>
</x-layout>