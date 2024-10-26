<div wire:poll.visible>
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
        <div class="col-md-2">
            <div class="d-grid text-end">
                <x-form.action-link class="btn-sm btn-success" text="{{ __('button.create') }}" icon="ri-add-line"
                    :route="route('admin.smtp-servers.create')" permission="smtp-server.create" />
            </div>
        </div>
        {{-- .col --}}

        <div class="table-responsive">
            <table class="table">
                @foreach ($records as $record)
                    <tr wire:key="{{ $record->id }}">
                        <td>{{ __('smtp-server.table.transport') }}</td>
                        <td>{{ $record->transport }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.host') }}</td>
                        <td>{{ $record->host }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.port') }}</td>
                        <td>{{ $record->port }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.encryption') }}</td>
                        <td>{{ $record->encryption }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.username') }}</td>
                        <td>{{ $record->username }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.password') }}</td>
                        <td>{{ $record->password }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.timeout') }}</td>
                        <td>
                            @if ($record->timeout == null)
                                <span class="badge bg-success">{{ __('smtp-server.table.no_timeout') }}</span>
                            @else
                                {{ $record->timeout }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.auth_mode') }}</td>
                        <td><x-form.toggle-checkbox :record="$record" field="auth_mode" /></td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.active') }}</td>
                        <td><x-form.toggle-checkbox :record="$record" field="active" /></td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.default') }}</td>
                        <td><x-form.toggle-checkbox :record="$record" field="default" /></td>
                    </tr>
                    <tr>
                        <td>{{ __('smtp-server.table.actions') }}</td>
                        <td class="text-end">
                            <x-form.action-link class="btn-sm btn-success" text="{{ __('button.edit') }}"
                                icon="ri-pencil-line" :route="route('admin.smtp-servers.edit', $record->id)" permission="smtp-server.update" />

                            @if ($records->count() > 1)
                                <x-form.action-button wire:click="confirmDelete({{ $record->id }})"
                                    class="btn-sm btn-danger" permission="smtp-server.delete" />
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $records->links() }}
    </div>
