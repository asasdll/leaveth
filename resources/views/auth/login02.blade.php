<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>{{  'leaveth' }}</title>
      <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/assets/img/icon_i2.png" />


    <!-- // PLUGINS (css files) // -->

    <link href="{{ URL::to('/') }}/assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!--// BOOTSTRAP & Main //-->

    <link href="{{ URL::to('/') }}/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/css/main.css" rel="stylesheet">

</head>



<body>



    <!--========================================

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>

    <!--========================================

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



        <div class="container">

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="/">

                    <img src="{{ URL::to('/') }}/assets/img/icon_i2.png" class="logo" alt="logo">

                </a>

            </div>

            <!-- End Header Navigation -->



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                    <li class="active scroll"><a href="#home">Home</a></li>

                    <li class="scroll"><a href="#about">About</a></li>

                    <li class="scroll"><a href="#services">Services</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Sign in</button>

                    </li>

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

    </nav>



    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption">
                    
                

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form id="from1" method="POST" action="{{'register'}}" class="signup-form">

                      @csrf
                        <h2 class="text-center">สมัครสมาชิก</h2>

                        <hr>

                        <div class="form-group">

                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Name" required autocomplete="name" autofocus>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                            <font color="red">{{"กรุณากรอก ชื่อ"}}</font>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">

                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail"  required autocomplete="email">

                          @error('email')
                          <span class="invalid-feedback" role="alert">
                            <font color="red">{{"E-mail ถูกใช้ไปเเล้ว"}}</font>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">

                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <font color="red">{{"กรุณาใส่ Password ให้ตรงกัน  หรือ อย่างน้อย 8 ตัวอักษร"}}</font>
                          </span>
                          @enderror

                        </div>

                        <div class="form-group">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">

                           <select class="form-control form-control @error('status') is-invalid @enderror"  name="status" size="0"  required autocomplete="status">
                             <option>เลือกลักษณะการใช้งาน</option>
                             <option value="hr">เจ้าของบริษัท/ฝ่ายบุคคล HR</option>
                             <option value="personnel">พนักงานทั่วไป</option>
                           </select>
                           @error('status')
                              <span class="invalid-feedback" role="alert">
                                <font color="red">{{"กรุณา เลือกลักษณะการใช้งาน"}}</font>
                              </span>
                              @enderror
                          </div>
                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">สมัคร</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>



    <!--========================================

           About Us

    ========================================-->



    <section id="about" class="section-padding">

        <div class="container">

            <h2>การบริการของเรา</h2>

            <div class="row">

                <div class="col-md-6">

                    <div class="icon-box">

                        <i class="material-icons">alarm_on</i>

                        <h4>บริการ ระบบลงเวลา</h4>
                          
                    <p>เป็นระบบ ลงเวลาทำงาน  ไว้ให้บริการ สำหรับพนักงาน เเละ องค์กร  ให้สะดวกสะบายมากขึ้น</p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="icon-box">

                        <i class="material-icons">description</i>

                        <h4>บริการ ระบบ ลางาน</h4>

                        <p>เป็นระบบ ลางาน  ไว้ให้บริการ สำหรับพนักงานภายในองค์กร ให้สะดวกสะบายมากขึ้น</p>

                    </div>

                </div>
            </div>

        </div>

    </section>



    <!--========================================

           Story

    ========================================-->



    <section id="story">

        <div class="container-fluid">

            <div class="row">

                <!-- Img -->

                <div class="col-md-6 story-bg">

                </div>

                <!-- Story Caption -->

                <div class="col-md-6">

                    <div class="story-content">

                        <h2>Leaveth.com</h2>

                        <p class="story-quote">

                            "บริการ ระบบลงเวลา เเละ ระบบ ลางาน"
                      

                        </p>

                        <div class="story-text">

                            <p>Leaveth.com  เป็นเว็บไชต์ ที่ให้บริการ ระบบลงเวลา เเละ ระบบ ลางาน  ในรูปเเบบ ออนไลน์  เป็บระบบทีี่เหมาะสม กับ  ธุระกิจ ขนาดเล็กเเละขนาดกลาง 
                                หรือ ระบบงานเเบบ statusup  ที่ให้ความสะดวกสะบายในการจัดการการลงเวลา การการลาของพนักงานได้อย่างดีเยียม
                            </p>

                        </div>

                        <a href="#" class="btn btn-white">Learn More</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--========================================

           Services

    ========================================-->



    <section id="services" class="section-padding">

        <div class="container">

            <h2>การบริการ</h2>

           

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">storage</i>

                        <h4>บริการสำรองข้อมูล</h4>

                        <p>บริการสำรองข้อมูล ของ users</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">monetization_on</i>

                        <h4>บริการชำระบบเงิน</h4>

                        <p>บริการชำระเงิน ของการใช้งานของระบบ</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">forum</i>

                        <h4>สอบถามข้อมูลเพิ่มเติม</h4>

                        <p>สามารถถามข้อมูลเพิ่มเติมที่ได้ได้ที่ laeaveth </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <img src="{{ URL::to('/') }}/assets/img/icon_i2.png" class="img-responsive center-block" alt="logo">

                    <hr>

                    <h5 class="pull-left">Leaveth, &copy;2020 All rights reserved</h5>

                    <ul class="liste-unstyled pull-right">

                        <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>



    <!--========================================

           Modal

    ========================================-->



    <!-- Modal -->

    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>

                <div class="modal-body">

                    <form id="from2" method="POST" action="{{'login'}}" class="signup-form">

                      @csrf
                        <div class="form-group">

                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email"  placeholder="E-mail">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                            <font color="red">{{"กรุณาตรวจสอบ E-mail  อีกครั้ง"}}</font>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">

                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <font color="red">{{"กรุณาตรวจสอบ  Password อีกครั้ง"}}</font>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Log In</button>

                        </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a href="#">Forgot your password /</a>

                    <a href="#">Signup</a>

                </div>

            </div>

        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="{{ URL::to('/') }}/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="{{ URL::to('/') }}/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="{{ URL::to('/') }}/assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="{{ URL::to('/') }}/assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="{{ URL::to('/') }}/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="{{ URL::to('/') }}/assets/js/main.js"></script>



</body>



</html>



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
                        <input class="input100  @error('email') is-invalid @enderror" id="email" type="text"
                            name="email" autocomplete="email">
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
                        <a class="txt2" href="#">
                            Sign Up
                        </a>
                        /<a href="#"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
