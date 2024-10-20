@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('client.title.show') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.clients.index'), 'label' => __('client.breadcrumb.index')],
        ['label' => __('client.breadcrumb.show')],
    ]" />

    <div class="row">
        {{-- client Profile --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="client-profile mt-3">
                        <div class="text-center">
                            <a href="{{ route('admin.clients.show', $client->id) }}">
                                <img src="{{ $client->profile && $client->profile->avatar
                                    ? (str_contains($client->profile->avatar, 'avatars/avatar')
                                        ? asset($client->profile->avatar) // Predefined avatar
                                        : asset('storage/' . $client->profile->avatar)) // Uploaded avatar
                                    : asset('avatars/avatar.png') }}"
                                    alt="{{ $client->name }}" class="avatar-md rounded-circle">
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <h4 class="font-size-16 mb-1">{{ ucwords($client->name) }}</h4>
                        </div>
                        {{-- /.name --}}

                        {{-- menu --}}
                        <div class="text-center mt-4">
                            <div class="d-grid mb-2">
                                @if ($client->active)
                                    <x-form.action-link text="{{ __('client.table.client_can_login') }}" class="btn-success"
                                        icon="ri-thumb-up-line" :route="route('admin.clients.show', ['client' => $client->id, 'active' => 0])" />
                                @else
                                    <x-form.action-link text="{{ __('client.table.client_cannot_login') }}" class="btn-danger"
                                        icon="ri-thumb-down-line" :route="route('admin.clients.show', ['client' => $client->id, 'active' => 1])" />
                                @endif
                            </div>
                            <div class="d-grid mb-2">
                                @if ($client->email_verified_at)
                                    <x-form.action-link text="{{ __('client.table.email_verified') }}" class="btn-success"
                                        icon="ri-thumb-up-line" :route="route('admin.clients.show', [
                                            'client' => $client->id,
                                            'email_verified' => 0,
                                        ])" />
                                @else
                                    <x-form.action-link text="{{ __('client.table.email_not_verified') }}" class="btn-danger"
                                        icon="ri-thumb-down-line" :route="route('admin.clients.show', [
                                            'client' => $client->id,
                                            'email_verified' => 1,
                                        ])" />
                                @endif
                            </div>
                            <div class="d-grid mb-2">
                                <x-form.action-link text="{{ __('Edit client') }}" icon="ri-pencil-line" :route="route('admin.clients.edit', $client->id)"
                                    permission="client.edit" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /.card-body --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col left --}}

        <div class="col-md-9">
            {{-- client Information --}}
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Email</td>
                            <td>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td>{{ $client->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        <tr>
                            <td>Updated At</td>
                            <td>{{ $client->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        @if ($client->email_verified_at)
                            <tr>
                                <td>Email Verified At</td>
                                <td>{{ $client->email_verified_at->format(config('date.default_date')) }}</td>
                            </tr>
                        @endif
                    </table>
                    <div class="row">
                        <div class="col">
                            <h3>Additional Informaion</h3>
                        </div>
                    </div>
                    {{-- /.row --}}
                    <table class="table">
                        <tr>
                            <td>Mobile No.</td>
                            <td>{{ $client->profile->mobile }}</td>
                        </tr>
                        <tr>
                            <td>WhatsApp</td>
                            <td>{{ $client->profile->whatsapp }}</td>
                        </tr>
                        <tr>
                            <td>Skype</td>
                            <td>{{ $client->profile->skype }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $client->profile->country }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $client->profile->state }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $client->profile->city }}</td>
                        </tr>
                        <tr>
                            <td>Profile Created Time</td>
                            <td>{{ $client->profile->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        <tr>
                            <td>Profile Last Updated</td>
                            <td>{{ $client->profile->updated_at->format(config('date.default_date')) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col right --}}
    </div>
    {{-- /.row --}}
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
