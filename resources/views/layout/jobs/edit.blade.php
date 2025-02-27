<x-layout>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Edit Job Listing
        </h2>
        <form method="POST" action="{{ route('update', $job->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Heading --}}
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Job Info</h2>

            {{-- Job Title Input Text --}}
            <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer" :value="old('title', $job->title)" />
    
            {{-- Textarea Job Description --}}
            <x-inputs.text-area label="Job Description" id="description" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." :value="old('description', $job->description)" />
    
            {{-- Salary Input Number --}}
            <x-inputs.text type="number" id="salary" name="salary" label="Annual Salary" placeholder="90000" :value="old('salary', $job->salary)" />
    
            {{-- Textarea Requirements --}}
            <x-inputs.text-area label="Requirements" id="requirements" name="requirements" placeholder="Bachelor's degree in Computer Science" :value="old('requirements', $job->requirements)" />
    
            {{-- Textarea Benefits --}}
            <x-inputs.text-area label="Benefits" id="benefits" name="benefits" placeholder="Health insurance, 401k, paid time off" :value="old('benefits', $job->benefits)" />
    
            {{-- Job Title Input Text --}}
            <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" placeholder="development,coding,java,python" :value="old('tags', $job->tags)" />
    
            {{-- Job Type Select Input --}}
            <x-inputs.select id="job_type" name="job_type" label="Job Type" :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract', 'Temporary' => 'Temporary', 'Internship' => 'Internship', 'Volunteer' => 'Volunteer', 'On-Call' => 'On-Call']" :value="old('job_type', $job->job_type)" />
            
            {{-- Remote Select Input --}}
            <x-inputs.select id="remote" name="remote" label="Remote" :options="['0' => 'No', '1' => 'Yes']" :value="old('remote', $job->remote)" />
    
            {{-- Address Input Text --}}
            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St" :value="old('address', $job->address)" />
    
            {{-- City Input Text --}}
            <x-inputs.text id="city" name="city" label="City" placeholder="Albany" :value="old('city', $job->city)" />
    
            {{-- State Input Text --}}
            <x-inputs.text id="state" name="state" label="State" placeholder="NY" :value="old('state', $job->state)" />
    
            {{-- ZipCode Input Text --}}
            <x-inputs.text id="zipcode" name="zipcode" label="Zip Code" placeholder="12201" :value="old('zipcode', $job->zipcode)" />
    
            {{-- Heading --}}
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>
    
            {{-- Company Name Input Text --}}
            <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Company name" :value="old('company_name', $job->company_name)" />
    
            {{-- Textarea Company Description --}}
            <x-inputs.text-area label="Company Description" id="company_description" name="company_description" placeholder="Company Description" :value="old('company_description', $job->company_description)" />
    
            {{-- Company Website Input Text --}}
            <x-inputs.text id="company_website" name="company_website" label="Company Website" placeholder="Enter website" :value="old('company_website', $job->company_website)" />
    
            {{-- Contact Phone Input Text --}}
            <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter phone" :value="old('contact_phone', $job->contact_phone)" />
    
            {{-- Contact Email Input Email --}}
            <x-inputs.text type="email" id="contact_email" name="contact_email" label="Contact Email" placeholder="Email where you want to receive applications" :value="old('contact_email', $job->contact_email)" />
    
            {{-- Company Logo Input File --}}
            <x-inputs.text type="file" id="company_logo" name="company_logo" label="Company Logo" />
    
            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
    </x-layout>