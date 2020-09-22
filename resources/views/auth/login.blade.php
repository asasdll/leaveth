@extends('auth.layots_auth')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{'login'}}">

                @csrf
                <span class="login100-form-title p-b-26">
                    Leaveth
                </span>
                <span class="login100-form-title p-b-48">
                    <img src="{{ URL::to('/') }}/assets/img/icon_i2.png" height="60px">
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100  @error('email') is-invalid @enderror" id="email" type="text" name="email"
                        autocomplete="email">
                    @error('email')
                    <span class="validate-input" role="alert">
                        <font color="red">{{"กรุณาตรวจสอบ E-mail  อีกครั้ง"}}</font>
                    </span>
                    @enderror
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100  @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" autocomplete="new-password">
                    @error('password')
                    <span class="validate-input" role="alert">
                        <font color="red">{{"กรุณาตรวจสอบ  Password อีกครั้ง"}}</font>
                    </span>
                    @enderror
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <div class="text-right  p-b-20">
                    <a href="/resetpass">
                        Forgot password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-15">
                    <span class="txt1">
                        Don’t have an account?
                    </span>
                    <a class="txt2" href="/account">
                        Sign Up
                    </a>
                    /<a href="#"></a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection