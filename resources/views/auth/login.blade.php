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
                        <h2>{{ __('auth.title.login') }}</h2>
                    </div>
                    {{-- /.col --}}
                </div>
                {{-- /.row --}}


                <div class="mx-5">
                    <form action="{{ route('login.store') }}" method="POST" class="needs-validation" novalidate>
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
                            <div class="col-md-12 mb-2">
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ __('auth.db.password') }}" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12 mb-2">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">
                                        {{ __('auth.db.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- /.row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.button text="{{ __('auth.button.login') }}" icon="ri-arrow-right-line"
                                    iconPosition="right" />
                            </div>
                            <div class="col-md-6 text-end mt-2">
                                <a href="{{ route('forgot') }}">{{ __('auth.button.forgot_password') }}</a>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </form>

                    <div class="row mt-3">

                        <div class="col-md-12">
                            <a href="{{ route('register') }}">{{ __('auth.button.do_not_have_an_account') }}</a>
                        </div>

                        <!-- Separator -->
                        <div class="separator">
                            <span>{{ __('auth.separator.or_login_with') }}</span>
                        </div>

                        <div class="col-12 text-center">
                            <a href="{{ route('github.redirect') }}" class="text-dark">
                                <i class="ri-github-fill ri-2x"></i>
                            </a>
                            {{-- <a href="{{ route('github.redirect') }}" class="text-dark">
                                <i class="ri-google-fill ri-2x"></i>
                            </a>
                            <a href="{{ route('github.redirect') }}" class="text-dark">
                                <i class="ri-facebook-circle-fill ri-2x"></i>
                            </a>
                            <a href="{{ route('github.redirect') }}" class="text-dark">
                                <i class="ri-twitter-fill ri-2x"></i>
                            </a> --}}
                        </div>
                        {{-- /.col --}}

                        <!-- Augo Login -->
                        @env('local')
                        <div class="separator">
                            <span>{{ __('auth.separator.dev_login') }}</span>
                        </div>
                        <div class="col-md-6">
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Super Admin"
                                key="1" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Tester"
                                key="2" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Developer"
                                key="3" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Admin"
                                key="4" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Manager"
                                key="5" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="Staff"
                                key="6" />
                        </div>
                        {{-- /.col --}}
                        <div class="col-md-6">
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="User One"
                                key="7" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="User Two"
                                key="8" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="User Three"
                                key="9" />
                            <x-login-link class="btn btn-dark btn-sm mb-1 waves-effect waves-light" label="User Four"
                                key="10" />
                        </div>
                        {{-- /.col --}}
                        @endenv
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}
        </div>
        {{-- /.s3-authbox --}}
    </div>
    {{-- /.s3-container --}}
@endsection
{{-- /.s3-page --}}
