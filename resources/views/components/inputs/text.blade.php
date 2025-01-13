@props(['id', 'name', 'type' => 'text', 'value' => '', 'placeholder' => ''])

<div class="mb-4">
    <label class="block text-gray-700" for="{{ $id }}">{{ $value }}</label>
    <input
        id="{{ $id }}"
        type="{{ $type }}"
        name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none"
        placeholder="{{ $placeholder }}"
    />
</div>