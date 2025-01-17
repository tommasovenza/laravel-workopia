@props(['id', 'name', 'cols' => '30', 'rows' => '7', 'placeholder' => '', 'label' => null, 'value' => null])

<div class="mb-4">
    @if ($label)  
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <textarea
        cols="{{ $cols }}"
        rows="{{ $rows }}"
        id="{{ $id }}"
        name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none"
        placeholder="{{ $placeholder }}"
    >{{ old($name, $value) }}</textarea>
</div>