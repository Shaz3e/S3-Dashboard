@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('profile.title.profile') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['label' => __('profile.breadcrumb.profile')],
    ]" />


    @include('admin.profile.information')

    @include('admin.profile.additional-information')

    @include('admin.profile.avatar')

    @include('admin.profile.password')

    @include('admin.profile.delete')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
