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
            <input type="search" wire:model.live="search" class="form-control form-control-sm" placeholder="Search...">
        </div>
        {{-- .col --}}
        <div class="col-md-2 col-sm-12 mb-2">
            <select wire:model.live="showDeleted" class="form-control form-control-sm form-control-border">
                <option value="">Show All</option>
                <option value="true">Show Deleted</option>
            </select>
        </div>
        {{-- .col --}}
    </div>
    {{-- /.row --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('role.table.name') }}</th>
                                    <th>{{ __('role.table.guard_name') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $role)
                                    <tr>
                                        <td>{{ ucwords($role->name) }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>
                                            @if ($showDeleted)
                                                <x-form.action-button wire:click="confirmRestore({{ $role->id }})"
                                                    class="btn-sm btn-warning" text="{{ __('button.restore') }}"
                                                    icon="ri-delete-bin-7-line" permission="role.restore" />
                                                <x-form.action-button
                                                    wire:click="confirmForceDelete({{ $role->id }})"
                                                    class="btn-sm btn-danger" text="{{ __('button.delete') }}"
                                                    permission="role.force.delete" />
                                            @else
                                                <x-form.action-link class="btn-sm btn-primary"
                                                    text="{{ __('button.view') }}" icon="ri-eye-line" :route="route('admin.roles.show', $role->id)"
                                                    permission="role.read" />
                                                <x-form.action-link class="btn-sm btn-success"
                                                    text="{{ __('button.edit') }}" icon="ri-pencil-line"
                                                    :route="route('admin.roles.show', $role->id)" permission="role.update" />
                                                <x-form.action-button wire:click="confirmDelete({{ $role->id }})"
                                                    class="btn-sm btn-danger" permission="role.delete" />
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- /.card-body --}}
            </div>
            {{-- /.card --}}

            {{ $records->links() }}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
</div>
