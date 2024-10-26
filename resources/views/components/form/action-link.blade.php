@props([
    'route' => '#',
    'permission' => null,
    'text' => __('button.click_here'),
    'icon' => 'ri-links-line', // No icon by default
    'iconPosition' => 'left', // Can be 'left', 'right', or 'none'
    'class' => 'btn-sm btn-dark', // Default button class is btn-dark
])

@if (is_null($permission) || auth()->user()->can($permission))
    <a href="{{ $route }}" {{ $attributes->merge(['class' => 'btn waves-effect waves-light ' . $class]) }}>
        {{-- Render Left Icon --}}
        @if ($icon && $iconPosition === 'left')
            <i class="{{ $icon }} align-middle me-1"></i>
        @endif

        {{-- Button Text --}}
        {{ $text }}

        {{-- Render Right Icon --}}
        @if ($icon && $iconPosition === 'right')
            <i class="{{ $icon }} align-middle ms-1"></i>
        @endif
    </a>
@endif
