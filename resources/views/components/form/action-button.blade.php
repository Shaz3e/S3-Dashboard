@props([
    'route' => '#',
    'permission' => null,
    'text' => __('button.delete'),
    'icon' => 'ri-delete-bin-line', // No icon by default
    'iconPosition' => 'left', // Can be 'left', 'right', or 'none'
    'class' => 'btn-dark', // Default button class is btn-dark
])

@if (is_null($permission) || auth()->user()->can($permission))
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-sm waves-effect waves-light ' . $class]) }}
        data-toggle="modal" data-target="#deleteModal">

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
    </button>
@endif
