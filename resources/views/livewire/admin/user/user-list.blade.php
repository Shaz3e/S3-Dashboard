<div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="text-end">
                <x-form.action-link class="btn-sm btn-success" text="{{ __('button.create') }}" icon="ri-add-line"
                    :route="route('admin.users.create')" permission="user.create" />
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
        <div class="col-md-7 col-sm-12 mb-2">
            <input type="search" wire:model.live="search" class="form-control form-control-sm"
                placeholder="{{ __('filter.search') }}">
        </div>
        {{-- .col --}}
        <div class="col-md-2 col-sm-12 mb-2">
            <select wire:model.live="filterStatus" class="form-control form-control-sm form-control-border">
                <option value="">{{ __('user.filter.show_all') }}</option>
                <option value="0">{{ __('user.filter.inactive') }}</option>
                <option value="1">{{ __('user.filter.active') }}</option>
            </select>
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
        <x-table :headers="[
            '#',
            __('user.table.name'),
            __('user.table.email'),
            __('user.table.email_verified'),
            __('user.table.active'),
        ]" :records="$records">
            @php
                $totalRecords = $records->total();
                $currentPage = $records->currentPage();
                $perPage = $records->perPage();
                $id = $totalRecords - ($currentPage - 1) * $perPage;
            @endphp
            @foreach ($records as $user)
                @if ($user->id !== 1 && $user->id !== auth()->user()->id)
                    <tr wire:key="{{ $user->id }}">
                        <td>{{ $id-- }}</td>
                        <td>{{ ucwords($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->email_verified_at)
                                <span class="badge bg-success">Verified</span>
                            @else
                                <span class="badge bg-danger">Not Verified</span>
                            @endif
                        </td>
                        <td><x-form.toggle-checkbox :record="$user" field="active" /></td>
                        <td class="text-end">
                            @if ($showDeleted)
                                <x-form.action-button wire:click="confirmRestore({{ $user->id }})"
                                    class="btn-sm btn-warning" text="{{ __('button.restore') }}"
                                    icon="ri-delete-bin-7-line" permission="user.restore" />
                                <x-form.action-button wire:click="confirmForceDelete({{ $user->id }})"
                                    class="btn-sm btn-danger" text="{{ __('button.delete') }}"
                                    permission="user.force.delete" />
                            @else
                                <x-form.action-link class="btn-sm btn-primary" text="{{ __('button.view') }}"
                                    icon="ri-pencil-line" :route="route('admin.users.show', $user->id)" permission="user.read" />
                                <x-form.action-link class="btn-sm btn-success" text="{{ __('button.edit') }}"
                                    icon="ri-pencil-line" :route="route('admin.users.edit', $user->id)" permission="user.update" />
                                <x-form.action-button wire:click="confirmDelete({{ $user->id }})"
                                    class="btn-sm btn-danger" permission="user.delete" />
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </x-table>
    </div>
    {{ $records->links() }}

</div>
