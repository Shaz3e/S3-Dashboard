@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('client.title.index') }}" :breadcrumbs="[['url' => '/', 'label' => __('app.breadcrumb.dashboard')], ['label' => __('client.breadcrumb.index')]]" />

    @livewire('admin.client.client-list')
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
