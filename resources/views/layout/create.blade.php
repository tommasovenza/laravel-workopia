<x-layout>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">
        Create Job Listing
    </h2>
    <form method="POST" action="{{ route('store')}}" enctype="multipart/form-data">
        @csrf
        {{-- Heading --}}
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Job Info</h2>

        {{-- Job Title Input Text --}}
        <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer" />

        {{-- Textarea Job Description --}}
        <x-inputs.text-area label="Job Description" id="description" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." />

        {{-- Salary Input Number --}}
        <x-inputs.text type="number" id="salary" name="salary" label="Annual Salary" placeholder="90000" />

        {{-- Textarea Requirements --}}
        <x-inputs.text-area label="Requirements" id="requirements" name="requirements" placeholder="Bachelor's degree in Computer Science" />

        {{-- Textarea Benefits --}}
        <x-inputs.text-area label="Benefits" id="benefits" name="benefits" placeholder="Health insurance, 401k, paid time off" />

        {{-- Job Title Input Text --}}
        <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" placeholder="development,coding,java,python" />

        <div class="mb-4">
            <label class="block text-gray-700" for="job_type"
                >Job Type</label
            >
            <select
                id="job_type"
                name="job_type"
                class="w-full px-4 py-2 border rounded focus:outline-none"
            >
                <option value="Full-Time" selected>
                    Full-Time
                </option>
                <option value="Part-Time">Part-Time</option>
                <option value="Contract">Contract</option>
                <option value="Temporary">Temporary</option>
                <option value="Internship">Internship</option>
                <option value="Volunteer">Volunteer</option>
                <option value="On-Call">On-Call</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="remote"
                >Remote</label
            >
            <select
                id="remote"
                name="remote"
                class="w-full px-4 py-2 border rounded focus:outline-none"
            >
                <option value="false">No</option>
                <option value="true">Yes</option>
            </select>
        </div>

        {{-- Address Input Text --}}
        <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St" />

        {{-- City Input Text --}}
        <x-inputs.text id="city" name="city" label="City" placeholder="Albany" />

        {{-- State Input Text --}}
        <x-inputs.text id="state" name="state" label="State" placeholder="NY" />

        {{-- ZipCode Input Text --}}
        <x-inputs.text id="zipcode" name="zipcode" label="Zip Code" placeholder="12201" />

        {{-- Heading --}}
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

        {{-- Company Name Input Text --}}
        <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Company name" />

        {{-- Textarea Company Description --}}
        <x-inputs.text-area label="Company Description" id="company_description" name="company_description" placeholder="Company Description" />

        {{-- Company Website Input Text --}}
        <x-inputs.text id="company_website" name="company_website" label="Company Website" placeholder="Enter website" />

        {{-- Contact Phone Input Text --}}
        <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter phone" />

        {{-- Contact Email Input Email --}}
        <x-inputs.text type="email" id="contact_email" name="contact_email" label="Contact Email" placeholder="Email where you want to receive applications" />

        {{-- Company Logo Input File --}}
        <x-inputs.text type="file" id="company_logo" name="company_logo" label="Company Logo" />

        {{-- <div class="mb-4">
            <label class="block text-gray-700" for="company_logo"
                >Company Logo</label
            >
            <input
                id="company_logo"
                type="file"
                name="company_logo"
                class="w-full px-4 py-2 border rounded focus:outline-none"
            />
        </div> --}}

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
            Save
        </button>
    </form>
</div>
</x-layout>