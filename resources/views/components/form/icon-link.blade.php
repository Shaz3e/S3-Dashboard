@props([
    'route' => '#',
    'permission' => null,
    'icon' => 'ri-links-line', // No icon by default
    'class' => 'btn-sm btn-dark', // Default button class is btn-dark
])

@if (is_null($permission) || auth()->user()->can($permission))
    <a href="{{ $route }}" {{ $attributes->merge(['class' => 'btn waves-effect waves-light ' . $class]) }}>
        <i class="{{ $icon }}"></i>
    </a>
@endif
