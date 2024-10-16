@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('app.title.profile') }}" :breadcrumbs="[['url' => '/', 'label' => __('app.breadcrumb.dashboard')], ['label' => __('app.breadcrumb.profile')]]" />


    @include('admin.profile.information')

    @include('admin.profile.additional-information')

    @include('admin.profile.avatar')

    @include('admin.profile.password')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
