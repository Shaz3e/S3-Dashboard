@extends('components.layouts.guest')

@section('content')
    <div class="s3-container">
        <div class="s3-page">
            <div>
                <h2>Welcome to {{ config('app.name') }}</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, impedit? Asperiores quam, nobis nostrum
                    animi dicta beatae necessitatibus obcaecati, minus ullam aliquid atque laborum odio dolorum praesentium
                    aut, veritatis delectus?</p>
            </div>
        </div>
        {{-- /.s3-page --}}
        <div class="s3-authbox">
            <div class="container">
                <div class="row mx-5 m-2">
                    <div class="col-12 text-center">
                        <h4>{{ __('auth.heading.verify') }}</h4>
                        <p>{{ __('auth.message.verify') }}</p>
                    </div>
                    {{-- /.col --}}
                </div>
                {{-- /.row --}}


                <div class="mx-5">
                    <form action="{{ route('verify.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input name="email" class="form-control input-mask" data-inputmask="'alias': 'email'"
                                    placeholder="{{ __('auth.db.email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.button text="{{ __('auth.button.verify') }}" icon="ri-arrow-right-line"
                                    iconPosition="right" />
                            </div>
                            <div class="col-md-6 text-end mt-2">
                                <a href="{{ route('login') }}">{{ __('auth.button.back_to_login') }}</a>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </form>

                    <div class="row mt-3">

                        <div class="col-md-6">
                            <a href="{{ route('register') }}">{{ __('auth.button.forgot_password') }}</a>
                        </div>
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}
        </div>
        {{-- /.s3-container --}}
    @endsection
    {{-- /.s3-page --}}
