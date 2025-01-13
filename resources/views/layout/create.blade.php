<x-layout>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">
        Create Job Listing
    </h2>
    <form method="POST" action="/jobs" enctype="multipart/form-data">
        {{-- Heading --}}
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
            Job Info
        </h2>

        {{-- Job Title Input Text --}}
        <x-text id="title" name="title" value="Job Title" placeholder="Software Engineer" />

        <div class="mb-4">
            <label class="block text-gray-700" for="description"
                >Job Description</label
            >
            <textarea
                cols="30"
                rows="7"
                id="description"
                name="description"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
            ></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="salary"
                >Annual Salary</label
            >
            <input
                id="salary"
                type="number"
                name="salary"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="90000"
            />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="requirements"
                >Requirements</label
            >
            <textarea
                id="requirements"
                name="requirements"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="Bachelor's degree in Computer Science"
            ></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="benefits"
                >Benefits</label
            >
            <textarea
                id="benefits"
                name="benefits"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="Health insurance, 401k, paid time off"
            ></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="tags"
                >Tags (comma-separated)</label
            >
            <input
                id="tags"
                type="text"
                name="tags"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="development,coding,java,python"
            />
        </div>

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
        <x-text id="address" name="address" value="Address" placeholder="123 Main St" />

        {{-- City Input Text --}}
        <x-text id="city" name="city" value="City" placeholder="Albany" />

        {{-- State Input Text --}}
        <x-text id="state" name="state" value="State" placeholder="NY" />

        {{-- ZipCode Input Text --}}
        <x-text id="zipcode" name="zipcode" value="Zip Code" placeholder="12201" />

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
            Company Info
        </h2>

        {{-- Company Name Input Text --}}
        <x-text id="company_name" name="company_name" value="Company Name" placeholder="Company name" />

        <div class="mb-4">
            <label
                class="block text-gray-700"
                for="company_description"
                >Company Description</label
            >
            <textarea
                id="company_description"
                name="company_description"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="Company Description"
            ></textarea>
        </div>

        {{-- Company Website Input Text --}}
        <x-text id="company_website" name="company_website" value="Company Website" placeholder="Enter website" />

        {{-- Contact Phone Input Text --}}
        <x-text id="contact_phone" name="contact_phone" value="Contact Phone" placeholder="Enter phone" />

        <div class="mb-4">
            <label class="block text-gray-700" for="contact_email"
                >Contact Email</label
            >
            <input
                id="contact_email"
                type="email"
                name="contact_email"
                class="w-full px-4 py-2 border rounded focus:outline-none"
                placeholder="Email where you want to receive applications"
            />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="company_logo"
                >Company Logo</label
            >
            <input
                id="company_logo"
                type="file"
                name="company_logo"
                class="w-full px-4 py-2 border rounded focus:outline-none"
            />
        </div>

        <button
            type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
        >
            Save
        </button>
    </form>
</div>
</x-layout>