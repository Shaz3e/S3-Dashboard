@extends('components.layouts.app')

@section('content')
    <x-page-title title="{{ __('client.title.edit') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.clients.index'), 'label' => __('client.breadcrumb.index')],
        ['label' => __('client.breadcrumb.edit')],
    ]" />

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="text" label="{{ __('client.table.name') }}" name="name"
                                        value="{{ $client->name }}" required />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="email" label="{{ __('client.table.email') }}" name="email"
                                        value="{{ $client->email }}" required />
                                </div>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-form.input type="password" label="{{ __('client.table.password') }}" name="password"
                                        help_text="{{ __('client.table.unchanged_password') }}" />
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
