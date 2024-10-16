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
                <div class="row m-2">
                    <div class="col-12 text-center">
                        <h2>{{ __('auth.title.reset') }}</h2>
                    </div>
                    {{-- /.col --}}
                </div>
                {{-- /.row --}}


                <div class="mx-5">
                    <form action="{{ route('reset.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <x-form.input type="hidden" name="token" value="{{ request('token') }}" />
                        <x-form.input type="hidden" name="email" value="{{ request('email') }}" />
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ __('auth.db.password') }}" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12 mb-2">
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="{{ __('auth.db.confirm_password') }}" required>
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.button text="{{ __('auth.button.reset_password') }}" icon="ri-arrow-right-line"
                                    iconPosition="right" />
                            </div>
                            <div class="col-md-6 text-end mt-2">
                                <a href="{{ route('login') }}">{{ __('auth.button.back_to_login') }}</a>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </form>
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}
        </div>
        {{-- /.s3-container --}}
    @endsection
    {{-- /.s3-page --}}
