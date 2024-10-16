@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('role.title.create') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.roles.index'), 'label' => __('role.breadcrumb.index')],
        ['label' => __('role.breadcrumb.create')],
    ]" />

    <form action="{{ route('admin.roles.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">{{ __('role.table.name') }}</label>
                                    <x-form.input type="text" name="name" required />
                                </div>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </div>
                    {{-- /.card-body --}}
                    <div class="card-footer">
                        <x-form.button />
                    </div>
                    {{-- /.card-footer --}}
                </div>
                {{-- /.card --}}
            </div>
            {{-- /.col --}}
        </div>
        {{-- /.row --}}
    </form>
@endsection

@push('styles')
    {{-- CSS here --}}
@endpush

@push('scripts')
    {{-- JS here --}}
@endpush
