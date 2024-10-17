@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('permission.title.index') }}" :breadcrumbs="[['url' => '/', 'label' => __('app.breadcrumb.dashboard')], ['label' => __('permission.breadcrumb.index')]]" />

    @livewire('admin.permission.permission-list')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
