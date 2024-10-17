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
                        <h2>{{ __('auth.title.register') }}</h2>
                    </div>
                    {{-- /.col --}}
                </div>
                {{-- /.row --}}


                <div class="mx-5">
                    <form action="{{ route('register.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input type="text" name="name" placeholder="{{__('auth.db.name')}}" class="form-control" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12 mb-2">
                                <input type="email" name="email" placeholder="{{__('auth.db.email')}}" class="form-control" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12 mb-2">
                                <input type="password" name="password" placeholder="{{__('auth.db.password')}}" class="form-control" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12 mb-2">
                                <input type="password" name="confirm_password" placeholder="{{__('auth.db.confirm_password')}}"
                                    class="form-control" required>
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <x-form.button text="{{ __('auth.button.register') }}" icon="ri-arrow-right-line"
                                    iconPosition="right" />
                            </div>
                            <div class="col-md-8 text-end mt-2">
                                <a href="{{ route('login') }}">{{ __('auth.button.already_have_an_account') }}</a>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                    </form>

                    <div class="row mt-3">
                        <!-- Separator -->
                        <div class="separator">
                            <span>{{ __('auth.separator.or_register_with') }}</span>
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
