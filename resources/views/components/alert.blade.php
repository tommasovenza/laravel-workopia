@props(['type', 'message'])

@if (session()->has('message'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"  x-show="show">
    @if($type === 'success')
        <p class="text-white text-sm bg-green-500 p-4 mb-4 rounded">{{ session('message') }}</p> 
    @else
        <p class="text-white text-sm bg-red-500 p-4 mb-4 rounded">{{ session('message') }}</p> 
    @endif
</div>
@endif