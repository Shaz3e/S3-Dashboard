@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('user.title.show') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.users.index'), 'label' => __('user.breadcrumb.index')],
        ['label' => __('user.breadcrumb.show')],
    ]" />

    <div class="row">
        {{-- User Profile --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="user-profile mt-3">
                        <div class="text-center">
                            <a href="{{ route('admin.users.show', $user->id) }}">
                                <img src="{{ $user->profile && $user->profile->avatar
                                    ? (str_contains($user->profile->avatar, 'avatars/avatar')
                                        ? asset($user->profile->avatar) // Predefined avatar
                                        : asset('storage/' . $user->profile->avatar)) // Uploaded avatar
                                    : asset('avatars/avatar.png') }}"
                                    alt="{{ $user->name }}" class="avatar-md rounded-circle">
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <h4 class="font-size-16 mb-1">{{ ucwords($user->name) }}</h4>
                        </div>
                        {{-- /.name --}}

                        {{-- menu --}}
                        <div class="text-center mt-4">
                            <div class="d-grid mb-2">
                                @if ($user->active)
                                    <x-form.action-link text="{{ __('user.table.user_can_login') }}" class="btn-success"
                                        icon="ri-thumb-up-line" :route="route('admin.users.show', ['user' => $user->id, 'active' => 0])" />
                                @else
                                    <x-form.action-link text="{{ __('user.table.user_cannot_login') }}" class="btn-danger"
                                        icon="ri-thumb-down-line" :route="route('admin.users.show', ['user' => $user->id, 'active' => 1])" />
                                @endif
                            </div>
                            <div class="d-grid mb-2">
                                @if ($user->email_verified_at)
                                    <x-form.action-link text="{{ __('user.table.email_verified') }}" class="btn-success"
                                        icon="ri-thumb-up-line" :route="route('admin.users.show', [
                                            'user' => $user->id,
                                            'email_verified' => 0,
                                        ])" />
                                @else
                                    <x-form.action-link text="{{ __('user.table.email_not_verified') }}" class="btn-danger"
                                        icon="ri-thumb-down-line" :route="route('admin.users.show', [
                                            'user' => $user->id,
                                            'email_verified' => 1,
                                        ])" />
                                @endif
                            </div>
                            <div class="d-grid mb-2">
                                <x-form.action-link text="{{ __('Edit User') }}" icon="ri-pencil-line" :route="route('admin.users.edit', $user->id)"
                                    permission="user.edit" />
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
            {{-- User Information --}}
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td>{{ $user->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        <tr>
                            <td>Updated At</td>
                            <td>{{ $user->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        @if ($user->email_verified_at)
                            <tr>
                                <td>Email Verified At</td>
                                <td>{{ $user->email_verified_at->format(config('date.default_date')) }}</td>
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
                            <td>{{ $user->profile->mobile }}</td>
                        </tr>
                        <tr>
                            <td>WhatsApp</td>
                            <td>{{ $user->profile->whatsapp }}</td>
                        </tr>
                        <tr>
                            <td>Skype</td>
                            <td>{{ $user->profile->skype }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $user->profile->country }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $user->profile->state }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $user->profile->city }}</td>
                        </tr>
                        <tr>
                            <td>Profile Created Time</td>
                            <td>{{ $user->profile->created_at->format(config('date.default_date')) }}</td>
                        </tr>
                        <tr>
                            <td>Profile Last Updated</td>
                            <td>{{ $user->profile->updated_at->format(config('date.default_date')) }}</td>
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
