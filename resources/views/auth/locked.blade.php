@extends('components.layouts.guest')

@section('content')
    <div class="s3-container">

        <div class="s3-page">
            <div>
                <h2>Welcome to {{ config('app.name') }}</h2>

                <div>
                    <p class="page-text"></p>
                </div>
            </div>
        </div>
        {{-- /.s3-page --}}

        <div class="s3-authbox">
            <div class="container">
                <div class="row m-2">
                    <div class="col-12 text-center">
                        <h2>{{ __('auth.heading.locked') }}</h2>
                        <p>{{ __('auth.message.locked') }}</p>
                    </div>
                    {{-- /.col --}}
                </div>
                {{-- /.row --}}

                <form action="{{ route('locked.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="row mx-5">
                        <div class="col-12 mb-2">
                            <input type="password" name="password" class="form-control" placeholder="{{__('auth.db.password')}}" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                           <x-form.button text="{{__('button.unlock')}}" icon="ri-lock-unlock-line" />
                        </div>
                    </div>
                    {{-- /.row --}}
                </form>
            </div>
            {{-- /.container --}}
        </div>
        {{-- /.s3-authbox --}}
    </div>
    {{-- /.s3-container --}}
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
