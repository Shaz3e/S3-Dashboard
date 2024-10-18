<div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="text-end">
                <x-form.action-link class="btn-sm btn-success" text="{{ __('button.create') }}" icon="ri-add-line"
                    :route="route('admin.roles.create')" permission="role.create" />
            </div>
        </div>
    </div>
    {{-- /.row --}}
    <div class="row mb-3">
        <div class="col-md-1 col-sm-12 mb-2">
            <select wire:model.live="perPage" class="form-control form-control-sm form-control-border">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        {{-- /.col --}}
        <div class="col-md-9 col-sm-12 mb-2">
            <input type="search" wire:model.live="search" class="form-control form-control-sm"
                placeholder="{{ __('filter.search') }}">
        </div>
        {{-- .col --}}
        <div class="col-md-2 col-sm-12 mb-2">
            <select wire:model.live="showDeleted" class="form-control form-control-sm form-control-border">
                <option value="">{{ __('filter.show_all') }}</option>
                <option value="true">{{ __('filter.show_deleted') }}</option>
            </select>
        </div>
        {{-- .col --}}
    </div>
    {{-- /.row --}}

    <div wire:poll.visible>
        <x-table :headers="['#', __('role.table.name'), __('role.table.guard_name')]" :records="$records">
            @php
                $totalRecords = $records->total();
                $currentPage = $records->currentPage();
                $perPage = $records->perPage();
                $id = $totalRecords - ($currentPage - 1) * $perPage;
            @endphp
            @foreach ($records as $role)
                <tr wire:key="{{ $role->id }}">
                    <td>{{ $id-- }}</td>
                    <td>{{ ucwords($role->name) }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td class="text-end">
                        @if ($showDeleted)
                            <x-form.action-button wire:click="confirmRestore({{ $role->id }})"
                                class="btn-sm btn-warning" text="{{ __('button.restore') }}" icon="ri-delete-bin-7-line"
                                permission="role.restore" />
                            <x-form.action-button wire:click="confirmForceDelete({{ $role->id }})"
                                class="btn-sm btn-danger" text="{{ __('button.delete') }}"
                                permission="role.force.delete" />
                        @else
                            <x-form.action-link class="btn-sm btn-success" text="{{ __('button.edit') }}"
                                icon="ri-pencil-line" :route="route('admin.roles.edit', $role->id)" permission="role.update" />
                            <x-form.action-button wire:click="confirmDelete({{ $role->id }})"
                                class="btn-sm btn-danger" permission="role.delete" />
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
    {{ $records->links() }}

</div>
