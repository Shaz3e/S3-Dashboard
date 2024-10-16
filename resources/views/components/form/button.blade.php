@props([
    'text' => __('button.save'),
    'icon' => 'ri-save-line', // No icon by default
    'iconPosition' => 'left', // Can be 'left', 'right', or 'none'
    'class' => '',
    'name' => '',
])

<button type="submit" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'btn btn-dark btn-sm waves-effect waves-light ' . $class]) }}>

    {{-- Render Left Icon --}}
    @if ($icon && $iconPosition === 'left')
        <i class="{{ $icon }} align-middle me-2"></i>
    @endif

    {{-- Button Text --}}
    {{ $text }}

    {{-- Render Right Icon --}}
    @if ($icon && $iconPosition === 'right')
        <i class="{{ $icon }} align-middle ms-2"></i>
    @endif
</button>
