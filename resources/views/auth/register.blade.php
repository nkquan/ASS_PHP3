@extends('layouts.client')

@section('content')
<div class="login-register-wrapper section-padding">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Register Content Start -->
                <div>
                    <div class="login-reg-form-wrap sign-up-form">
                        <h5>Singup Form</h5>
                        <form action="#" method="post">
                            <div class="single-input-item">
                                <input type="text" placeholder="Full Name" required />
                            </div>
                            <div class="single-input-item">
                                <input type="email" placeholder="Enter your Email" required />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Repeat your Password" required />
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
                                <button class="btn btn-sqr">Register</button>
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