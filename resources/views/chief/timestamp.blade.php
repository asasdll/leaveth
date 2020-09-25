@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_timestamp')
            <style>
            #circle { 

                width: 100px; /* ความกว้าง */

                height: 100px; /* ความสูง */

                background: btn btn-primary; /* สี */

                -moz-border-radius: 70px; 

                -webkit-border-radius: 70px; 

                border-radius: 70px;

                }
            </style>

                <div class="page-preloader">

                <div class="spinner">

                    <div class="rect1"></div>

                    <div class="rect2"></div>

                    <div class="rect3"></div>

                    <div class="rect4"></div>

                    <div class="rect5"></div>

                </div>

                </div>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">บันทึกเวลา</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    @include('layouts.navbar')
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 align = 'center' class="card-title">บันทึกเวลาทำงาน</h4>
                                    <p class="card-category">
                                       <div class="panel-body">
                                        @if(\Session::has('successv'))
                                        <div align = 'center' class="alert alert-danger">
                                          <p>{{\Session::get('successv')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                     @if(\Session::has('success'))
                                     <div align = 'center' class="alert alert-success">
                                       <p>{{\Session::get('success')}}</p>
                                     </div>
                                     @endif
                                 </div>
                                 <div class="panel-body">
                                  @if(\Session::has('successh'))
                                  <div class="alert alert-warning">
                                    <p>{{\Session::get('successh')}}</p>
                                  </div>
                                  @endif
                              </div>
                              </p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                  <form method="post" action="{{'down'}}" >
                                    @csrf
                                    <h3 align = 'center'><button id="circle" type="submit" class="btn btn-success" >Submit</button></h3>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
      <!--   -->
      @endsection