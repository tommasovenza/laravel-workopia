<!-- Header -->
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
                {{-- Used NavLink Component --}}
                <x-nav-link url="/" :active="request()->is('/')">Home</x-nav-link>
            @guest
                <x-nav-link url="/jobs/index" :active="request()->is('jobs/index')">All Jobs</x-nav-link>
                <x-nav-link icon="user" url="/login" :active="request()->is('login')">Login</x-nav-link>
                <x-nav-link url="/register" :active="request()->is('register')">Register</x-nav-link>
            @endguest
            @auth
                <x-nav-link url="/dashboard" :active="request()->is('dashboard')">
                    <i class="fa fa-gauge mr-1"></i> 
                    Dashboard
                </x-nav-link>
                <x-nav-link url="/jobs/saved" :active="request()->is('jobs/saved')">
                    Saved Jobs
                </x-nav-link>
                {{-- Button Link Component --}}
                <x-button-link 
                    url="/jobs/create" 
                    icon="edit" 
                    class="bg-yellow-500 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
                    hover="hover:bg-yellow-600"
                >
                    Create Job
                </x-button-link>
                {{-- Logout form --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>Logout</button>
                </form>
            @endauth
        </nav>
        <button
            id="hamburger"
            class="text-white md:hidden flex items-center"
        >
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2"
    >
        {{-- Used NavLink Component --}}
        <x-nav-link :mobile="true" :block="true" url="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link :mobile="true" :block="true" url="/jobs/index" :active="request()->is('jobs/index')">All Jobs</x-nav-link>
        <x-nav-link :mobile="true" :block="true" url="/jobs/saved" :active="request()->is('jobs/saved')">Saved Jobs</x-nav-link>
        <x-nav-link :mobile="true" :block="true" icon="user" url="/login" :active="request()->is('login')">Login</x-nav-link>
        <x-nav-link :mobile="true" :block="true" url="/register" :active="request()->is('register')">Register</x-nav-link>
        <x-nav-link :mobile="true" :block="true" url="/dashboard" :active="request()->is('dashboard')"><i class="fa fa-gauge mr-1"></i> Dashboard</x-nav-link>
        {{-- Button Link Component --}}
        <x-button-link 
            url="/jobs/create" 
            icon="edit" 
            class="bg-yellow-500 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
            hover="hover:bg-yellow-600"
            :block="true"
            :mobile="true"
        >Create Job
        </x-button-link>
    </div>
</header>