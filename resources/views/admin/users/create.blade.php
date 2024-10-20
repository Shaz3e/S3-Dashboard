@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('user.title.create') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.users.index'), 'label' => __('user.breadcrumb.index')],
        ['label' => __('user.breadcrumb.create')],
    ]" />

    <form action="{{ route('admin.users.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="text" label="{{ __('user.table.name') }}" name="name"
                                        required />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="email" label="{{ __('user.table.email') }}" name="email"
                                        required />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="password" label="{{ __('user.table.password') }}" name="password"
                                        required />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.select name="active" label="{{ __('user.table.active') }}" :options="[0 => 'Cannot Login', 1 => 'User Can login']" :selected="old('active', $option ?? 0)" required="true" />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.select name="email_verified_at" label="{{ __('user.table.email_verified') }}" :options="[0 => 'Email Verification Required', 1 => 'Email Verification Not Required']" :selected="old('active', $option ?? 0)" required="true" />
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
