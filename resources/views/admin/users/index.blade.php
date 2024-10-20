@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('user.title.index') }}" :breadcrumbs="[['url' => '/', 'label' => __('app.breadcrumb.dashboard')], ['label' => __('user.breadcrumb.index')]]" />

    @livewire('admin.user.user-list')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
