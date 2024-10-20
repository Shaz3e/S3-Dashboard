@props([
    'type' => 'submit',
    'text' => __('button.save'),
    'icon' => 'ri-save-line', // No icon by default
    'iconPosition' => 'left', // Can be 'left', 'right', or 'none'
    'class' => 'btn-dark btn-sm',
    'name' => '',
])

<button type="{{ $type }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'btn waves-effect waves-light ' . $class]) }}>

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
