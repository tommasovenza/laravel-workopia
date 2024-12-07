<!-- Header -->
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            {{-- Used NavLink Component --}}
            <x-nav-link url="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link url="/jobs/index" :active="request()->is('jobs/index')">All Jobs</x-nav-link>
            <x-nav-link url="/jobs/saved" :active="request()->is('jobs/saved')">Saved Jobs</x-nav-link>
            <x-nav-link icon="user" url="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link url="/register" :active="request()->is('register')">Register</x-nav-link>
            <x-nav-link url="/dashboard" :active="request()->is('dashboard')"><i class="fa fa-gauge mr-1"></i> Dashboard</x-nav-link>
            {{-- Button Link Component --}}
            <x-button-link url="/jobs/create" icon="edit">Create Job</x-button-link>
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
        <a href="{{ url('/jobs/index') }}" class="block px-4 py-2 hover:bg-blue-700 {{ request()->is('jobs/index') ? 'font-bold text-yellow-500' : '' }}"
            >All Jobs</a
        >
        <a
            href="{{ url('/jobs/saved') }}"
            class="block px-4 py-2 hover:bg-blue-700 {{ request()->is('jobs/saved') ? 'font-bold text-yellow-500' : '' }}"
            >Saved Jobs</a
        >
        <a
            href="{{ url('/dashboard') }}"
            class="block px-4 py-2 hover:bg-blue-700"
            >Dashboard</a
        >
        <a href="{{ url('/login') }}" class="block px-4 py-2 hover:bg-blue-700 {{ request()->is('login') ? 'font-bold text-yellow-500' : '' }}"
            >Login</a
        >
        <a
            href="{{ url('/register') }}"
            class="block px-4 py-2 hover:bg-blue-700 {{ request()->is('register') ? 'font-bold text-yellow-500' : '' }}"
            >Register</a
        >
        <a
            href="{{ url('/dashboard') }}"
            class="block hover:underline py-2 font-bold text-yellow-500 {{ request()->is('dashboard') ? 'font-bold text-yellow-500' : '' }}"
        >
            <i class="fa fa-gauge mr-1"></i> Dashboard
        </a>
        <a
            href="{{ url('/jobs/create') }}"
            class="block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black"
        >
            <i class="fa fa-edit"></i> Create Job
        </a>
    </div>
</header>