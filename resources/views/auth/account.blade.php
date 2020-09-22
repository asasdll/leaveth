@extends('auth.layots_auth')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form"  id="from1" method="POST" action="{{'register'}}">

                @csrf
                <span class="login100-form-title p-b-26">
                    Leaveth
                </span>
                <span class="login100-form-title p-b-48">
                    <img src="{{ URL::to('/') }}/assets/img/icon_i2.png" height="60px">
                </span>

                <div class="wrap-input100 validate-input" data-validate="Name">
                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" autocomplete="name">

                    <span class="focus-input100" data-placeholder="Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100  @error('email') is-invalid @enderror " id="email" type="text" name="email"
                        autocomplete="email">

                    <span class="focus-input100" data-placeholder="Email"></span>
                    @error('email')
                    <span class="validate-input" role="alert">
                        <font color="red">{{"E-mail ถูกใช้ไปเเล้ว"}}</font>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100  @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" autocomplete="new-password">

                    <span class="focus-input100" data-placeholder="Password"></span>
                    @error('password')
                    <span class="validate-input" role="alert">
                        <font color="red">{{"กรุณาใส่ Password ให้ตรงกัน  หรือ อย่างน้อย 8 ตัวอักษร"}}</font>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="password_confirmation">
                    <input id="password-confirm" type="password" class="input100 " name="password_confirmation">
                    <span class="focus-input100" data-placeholder="password_confirmation"></span>
                </div>

                <div class="wrap-input100 validate-input">

                    <select class="form-control @error('status') is-invalid @enderror" name="status"
                        size="0" required autocomplete="status">
                        <option value="hr">เจ้าของร้านค้า/กิจการ/ฝ่ายบุคคล HR</option>
                        <option value="personnel">พนักงานทั่วไป</option>
                    </select>
                    @error('status')
                    <span class="validate-input" role="alert">
                        <font color="red">{{"กรุณา เลือกลักษณะการใช้งาน"}}</font>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

@endsection