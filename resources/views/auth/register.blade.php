@extends('layouts.client')

@section('content')
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Register Content Start -->
                    <div>
                        <div class="login-reg-form-wrap sign-up-form">
                            <h5>Đăng kí</h5>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="single-input-item">
                                    <input type="text" class="@error('ho_ten') is-invalid @enderror" name="ho_ten"
                                        value="{{ old('ho_ten') }}" placeholder="Full Name" />
                                    @error('ho_ten')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="single-input-item">
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Enter your Email" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" class="@error('passowrd') is-invalid @enderror"
                                                name="password" placeholder="Enter your Password" />
                                            @error('passowrd')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" class="@error('confirmpassword') is-invalid @enderror"
                                                name="confirmpassword" placeholder="Repeat your Password" />
                                            @error('confirmpassowrd')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                <label class="custom-control-label" for="subnewsletter">Subscribe
                                                    Our Newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection
