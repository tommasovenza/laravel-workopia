<x-layout>
    <div>
        <p>Listing ID:{{ $listing->id }}</p>
        <ul>
            <li>{{ $listing->job_title }}</li>
            <li>{{ $listing->job_description }}</li>
        </ul>
    </div>
</x-layout>