@extends('layouts.client')

@section('content')
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div>
                        <div class="login-reg-form-wrap">
                            <h5>Đăng nhập</h5>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show container mt-2" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="close"></button>
                                </div>
                            @endif
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="single-input-item">
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                        placeholder="Email" value="{{ old('email') }}"/>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="single-input-item">
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                        placeholder="Mật khẩu" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection
