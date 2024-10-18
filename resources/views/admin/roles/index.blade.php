@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('role.title.index') }}" :breadcrumbs="[['url' => '/', 'label' => __('app.breadcrumb.dashboard')], ['label' => __('role.breadcrumb.index')]]" />

    @livewire('admin.role.role-list')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
