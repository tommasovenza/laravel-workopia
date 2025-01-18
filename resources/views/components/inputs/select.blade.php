@props(['id', 'label', 'name', 'value' => '', 'options' => []])

<div class="mb-4">
    @if ($label)  
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <select id="{{ $id }}" name="{{ $name }}" class="w-full px-4 py-2 border rounded focus:outline-none">
        <option value="">--Please make a choice</option>
        @foreach ($options as $option_value => $option_label)
            <option value="{{ $option_value }}" {{ old($name, $value) === $option_value ? 'selected' : '' }}>{{ $option_label }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>