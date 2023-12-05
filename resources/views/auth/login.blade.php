@extends('layouts.app')


@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <p class="text-center font-weight-bold" style="font-size: 30px;">LeanSure</p>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form method="POST" class="pt-3" action="{{ route('login') }}">
                                @csrf


                                <div class="row mb-3">

                                    <div class="col-12">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient-primary btn-lg font-weight-medium w-100">
                                        SIGN IN
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot
                                        password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
