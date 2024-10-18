@props([
    'record', // The model record
    'field', // The field to be toggled
    'onLabel' => __('button.yes'), // Label for the "On" state
    'offLabel' => __('button.no'), // Label for the "Off" state
])

<div>
    <input type="checkbox" wire:click="toggleStatus({{ $record->id }}, '{{ $field }}')"
        id="{{ $field }}_{{ $record->id }}" switch="bool" {{ $record->{$field} ? 'checked' : '' }} />
    <label for="{{ $field }}_{{ $record->id }}" data-on-label="{{ $onLabel }}"
        data-off-label="{{ $offLabel }}"></label>
</div>
