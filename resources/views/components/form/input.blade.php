@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'class' => 'form-control',
    'help_text' => '',
])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" class="{{ $class }}" id="{{ $name }}"
        placeholder="{{ $label }}" {{ $required ? 'required' : '' }} value="{{ old($name, $value) }}">
    <small class="d-block text-muted">{{ $help_text }}</small>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
