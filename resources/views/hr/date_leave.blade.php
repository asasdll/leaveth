@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_date_leave')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">กำหนดการลา</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                            <form align='center' method="POST" action="leave_date_index">
                                @csrf
                                <div class="form-group">
                                    @error('personalleave_date')
                                         <font color="#ff0000">{{ $message }}</font>
                                    @enderror
                                    <div class="form-group row">
                                        <label for="inputPassword" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลากิจ</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="personalleave_date">
                                        </div>
                                    </div>
                                    @error('vacationleave_date')
                                         <font color="#ff0000">{{ $message }}</font>
                                    @enderror
                                    <div class="form-group row">
                                        <label for="inputPassword" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลาพักร้อน</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="vacationleave_date">
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>
                                </div>
                            </form>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection