<div>
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
        <x-table :headers="['#', __('permission.table.name'), __('permission.table.guard_name')]" :records="$records">
            @php
                $totalRecords = $records->total();
                $currentPage = $records->currentPage();
                $perPage = $records->perPage();
                $id = $totalRecords - ($currentPage - 1) * $perPage;
            @endphp
            @foreach ($records as $permission)
                <tr wire:key="{{ $permission->id }}">
                    <td>{{ $id-- }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td></td>
                </tr>
            @endforeach
        </x-table>
    </div>

    {{ $records->links() }}

</div>
