@props([
    'route' => '#',
    'permission' => null,
    'icon' => 'ri-links-line', // No icon by default
    'class' => 'btn-sm btn-dark', // Default button class is btn-dark
])

@if (is_null($permission) || auth()->user()->can($permission))
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-sm waves-effect waves-light ' . $class]) }}
        data-toggle="modal" data-target="#deleteModal">
        <i class="{{ $icon }}"></i>
    </button>
@endif
