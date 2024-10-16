@props([
    'name',
    'options' => [], // Available options
    'label' => '', // Label for the select
    'placeholder' => 'Select an option', // Placeholder when nothing is selected
    'selected' => old($name, $selected), // Use old() to retain the value
    'required' => false,
    'class' => 'form-select', // CSS class for styling
    'select2' => false // Add select2 support
])
<div class="mb-3">
    <select name="{{ $name }}" id="{{ $name }}" class="{{ $class }}" {{ $required ? 'required' : '' }}>
        <option value="">{{ $label ?: $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ (string) $selected === (string) $key ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
