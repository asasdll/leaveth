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
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <p align='center'>{{session('success')}}</p>
                            </div>
                            @endif
                            @foreach($id_leave as $ticket1)
                            <form align='center'>
                                @csrf
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label for="staticEmail" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลาป่วย</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="sickleave_date"
                                                value="{{ $ticket1->sickleave_date}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลาพักร้อน</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="personalleave_date"
                                                value="{{ $ticket1->personalleave_date}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลากิจ</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="vacationleave_date"
                                                value="{{ $ticket1->vacationleave_date}}">
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <a href="{{action('Date_leaveController@edit',$ticket1->id_company)}}"
                                        class="btn btn-info btn-fill pull-right" role="button"
                                        aria-pressed="true">เเก้ไขข้อมูล</a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            @endforeach
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