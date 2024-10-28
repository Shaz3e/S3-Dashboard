@extends('components.layouts.app')

@section('content')
    @include('admin.setting.page-title')

    <div class="row">
        <div class="col-12">

            @include('admin.setting.sidebar')

            {{-- Right Sidebar --}}
            <div class="email-rightbar mb-3">

                @can('general-setting.list')
                    @if (request()->routeIs('admin.settings.general'))
                        @include('admin.setting.general.general')
                    @endif
                @endcan

                @can('auth-setting.list')
                    @if (request()->routeIs('admin.settings.auth'))
                        @include('admin.setting.auth.auth')
                    @endif
                @endcan

                @can('smtp-server.list')
                    @if (request()->routeIs('admin.smtp-servers.index'))
                        @include('admin.setting.smtp-server.index')
                    @endif
                    @if (request()->routeIs('admin.smtp-servers.create'))
                        @include('admin.setting.smtp-server.create')
                    @endif
                    @if (request()->routeIs('admin.smtp-servers.edit'))
                        @include('admin.setting.smtp-server.edit')
                    @endif
                @endcan

            </div>
            {{-- /.email-rightbar --}}

        </div>
        {{-- /.col --}}

    </div>
    {{-- /.row --}}
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
