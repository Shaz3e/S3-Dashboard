@extends('components.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ __('app.welcome_back_user', ['name' => auth()->user()->name]) }}</h4>
        </div>
    </div>
@endsection


@push('styles')
@endpush

@push('scripts')
@endpush
