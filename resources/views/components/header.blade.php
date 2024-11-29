<!-- The only way to do great work is to love what you do. - Steve Jobs -->
{{-- <header>
    <div class="navbar">
        <ul>
            <li><a href="{{ route("index") }}">Index Jobs</a></li>
            <li><a href="#">Create Jobs</a></li>
            <li><a href="#">Show Job</a></li>
        </ul>
    </div>
</header> --}}

<!-- Header -->
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <a href="{{ url('/jobs/index') }}" class="text-white hover:underline py-2"
                >All Jobs</a
            >
            <a
                href="{{ url('/jobs/saved') }}"
                class="text-white hover:underline py-2"
                >Saved Jobs</a
            >
            <a href="{{ url('/login') }}" class="text-white hover:underline py-2"
                >Login</a
            >
            <a
                href="{{ url('/register') }}"
                class="text-white hover:underline py-2"
                >Register</a
            >
            <a
                href="{{ url('/dashboard') }}"
                class="hover:underline py-2 font-bold text-yellow-500"
            >
                <i class="fa fa-gauge mr-1"></i> Dashboard
            </a>
            <a
                href="{{ url('/jobs/create') }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
            >
                <i class="fa fa-edit"></i> Create Job
            </a>
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
        <a href="{{ url('/jobs/index') }}" class="block px-4 py-2 hover:bg-blue-700"
            >All Jobs</a
        >
        <a
            href="{{ url('/jobs/saved') }}"
            class="block px-4 py-2 hover:bg-blue-700"
            >Saved Jobs</a
        >
        <a
            href="{{ url('/dashoboard') }}"
            class="block px-4 py-2 hover:bg-blue-700"
            >Dashboard</a
        >
        <a href="{{ url('/login') }}" class="block px-4 py-2 hover:bg-blue-700"
            >Login</a
        >
        <a
            href="{{ url('/register') }}"
            class="block px-4 py-2 hover:bg-blue-700"
            >Register</a
        >
        <a
            href="{{ url('/dashboard') }}"
            class="block hover:underline py-2 font-bold text-yellow-500"
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