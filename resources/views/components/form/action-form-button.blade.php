@props([
    'route' => '#',
    'permission' => null,
    'text' => __('button.delete'),
    'icon' => 'ri-delete-bin-line', // No icon by default
    'iconPosition' => 'left', // Can be 'left', 'right', or 'none'
    'class' => '',
])

@if (is_null($permission) || auth()->user()->can($permission))
    <form action="{{ $route }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" {{ $attributes->merge(['class' => 'btn btn-sm btn-danger']) }}>

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
    </form>
@endif
