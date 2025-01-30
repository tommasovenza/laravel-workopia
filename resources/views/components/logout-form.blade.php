@props(['icon'])

{{-- Logout form Component--}}
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"> <i class="fa-solid fa-{{ $icon }}"></i> 
        Logout
    </button>
</form>