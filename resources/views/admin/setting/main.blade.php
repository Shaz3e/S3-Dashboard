@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('setting.title.general') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['label' => __('setting.breadcrumb.general')],
    ]" />

    <div class="row">
        <div class="col-12">

            @include('admin.setting.sidebar')

            {{-- Right Sidebar --}}
            <div class="email-rightbar mb-3">

                @if (request()->routeIs('admin.settings.general'))
                    @include('admin.setting.general.general')
                @endif

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
