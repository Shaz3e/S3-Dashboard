@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('role.title.edit') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.roles.index'), 'label' => __('role.breadcrumb.index')],
        ['label' => __('role.breadcrumb.edit')],
    ]" />

    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ __('role.table.name') }}</label>
                                    <x-form.input type="text" name="name" value="{{ $role->name }}" required />
                                </div>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </div>
                    {{-- /.card-body --}}
                    <div class="card-footer">
                        <x-form.button />
                    </div>
                    {{-- /.card-footer --}}
                </div>
                {{-- /.card --}}
            </div>
            {{-- /.col --}}
        </div>
        {{-- /.row --}}
    </form>

    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('role.card_heading.permission') }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-0">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('role.table.permissions') }}</th>
                                        <th class="text-center">{{ __('role.table.all') }}</th>
                                        <th class="text-center">{{ __('role.table.list') }}</th>
                                        <th class="text-center">{{ __('role.table.create') }}</th>
                                        <th class="text-center">{{ __('role.table.read') }}</th>
                                        <th class="text-center">{{ __('role.table.update') }}</th>
                                        <th class="text-center">{{ __('role.table.delete') }}</th>
                                        <th class="text-center">{{ __('role.table.restore') }}</th>
                                        <th class="text-center">{{ __('role.table.force_delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions->groupBy(function ($permission) {
            return explode('.', $permission->name)[0];
        }) as $modelName => $modelPermissions)
                                        <tr>
                                            <td>
                                                {{ str_replace('-', ' ', strtoupper($modelName)) }}
                                            </td>
                                            <td class="text-center"><input type="checkbox"></td>
                                            @foreach (['list', 'create', 'read', 'update', 'delete', 'restore', 'force.delete'] as $action)
                                                <td class="text-center">
                                                    @if (
                                                        $modelPermissions->contains(function ($permission) use ($action) {
                                                            return str_contains($permission->name, $action);
                                                        }))
                                                        <input type="checkbox" name="permissions[]"
                                                            class="form-checkbox-input"
                                                            id="checkPermission-{{ $modelPermissions->first(function ($permission) use ($action) {
                                                                return str_contains($permission->name, $action);
                                                            })->id }}"
                                                            value="{{ $modelPermissions->first(function ($permission) use ($action) {
                                                                return str_contains($permission->name, $action);
                                                            })->name }}"
                                                            {{ in_array(
                                                                $modelPermissions->first(function ($permission) use ($action) {
                                                                    return str_contains($permission->name, $action);
                                                                })->id,
                                                                $rolePermissions,
                                                            )
                                                                ? 'checked'
                                                                : '' }} />
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- /.table-responsive --}}
                    </div>
                    {{-- /.card-body --}}
                    <div class="card-footer">
                        <x-form.button name="syncPermissions" text="Add/Remove Permissions" />
                    </div>
                    {{-- /.card-footer --}}
                </div>
                {{-- /.card --}}
            </div>
            {{-- /.col --}}
        </div>
        {{-- /.row --}}
    </form>
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    <script>
        // Select all checkboxes in a row when "All" is clicked
        $('tbody tr td:nth-child(2) input[type="checkbox"]').on('click', function() {
            var row = $(this).closest('tr');
            row.find('td input[type="checkbox"]').prop('checked', $(this).is(':checked'));
        });

        // Check "Delete" and "Restore" when "Force Delete" is clicked
        $('tbody tr td:nth-child(9) input[type="checkbox"]').on('click', function() {
            var row = $(this).closest('tr');
            if ($(this).is(':checked')) {
                row.find('td:nth-child(7) input[type="checkbox"]').prop('checked', true);
                row.find('td:nth-child(8) input[type="checkbox"]').prop('checked', true);
            }
        });
    </script>
@endpush
