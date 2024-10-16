@props(['name', 'options' => [], 'label' => '', 'selected' => '', 'required' => false])

<div class="mb-3">
    {{-- @if ($label)
        <label class="form-label">{{ $label }}</label>
    @endif --}}
    <div>
        @foreach ($options as $key => $option)
            <div class="form-check">
                <input type="radio" name="{{ $name }}" id="{{ $name }}_{{ $key }}"
                    value="{{ $key }}" class="form-check-input" {{ $selected == $key ? 'checked' : '' }}
                    {{ $required ? 'required' : '' }}>
                <label for="{{ $name }}_{{ $key }}" class="form-check-label">{{ $option }}</label>
            </div>
        @endforeach
    </div>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
