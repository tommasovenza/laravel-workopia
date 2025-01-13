<x-layout>
    {{-- Heading --}}
    <h2 class="text-2xl text-center border rounded border-color-gray p-4 mb-4">
        Recents Works
    </h2>
    {{-- Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 ">
        @foreach ($jobs as $job)
            {{-- Job Card Component --}}
            <x-job-card :job="$job" />
        @endforeach
    </div>

    {{-- Bottom Banner Component --}}
    <x-bottom-banner />
</x-layout>