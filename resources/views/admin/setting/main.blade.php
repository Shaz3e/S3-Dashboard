@extends('components.layouts.app')

@section('content')
    @if (request()->routeIs('admin.smtp-servers.index'))
        <x-page-title title="{{ __('smtp-server.title.index') }}" :breadcrumbs="[
            ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
            ['label' => __('smtp-server.breadcrumb.index')],
        ]" />
    @endif
    @if (request()->routeIs('admin.smtp-servers.create'))
        <x-page-title title="{{ __('smtp-server.title.create') }}" :breadcrumbs="[
            ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
            ['url' => route('admin.smtp-servers.index'), 'label' => __('smtp-server.breadcrumb.index')],
            ['label' => __('smtp-server.breadcrumb.create')],
        ]" />
    @endif
    @if (request()->routeIs('admin.smtp-servers.edit'))
        <x-page-title title="{{ __('smtp-server.title.edit') }}" :breadcrumbs="[
            ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
            ['url' => route('admin.smtp-servers.index'), 'label' => __('smtp-server.breadcrumb.index')],
            ['label' => __('smtp-server.breadcrumb.edit')],
        ]" />
    @endif

    <div class="row">
        <div class="col-12">

            @include('admin.setting.sidebar')

            {{-- Right Sidebar --}}
            <div class="email-rightbar mb-3">

                @if (request()->routeIs('admin.settings.general'))
                    @include('admin.setting.general.general')
                @endif

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
