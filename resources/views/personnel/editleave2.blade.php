@extends('layouts.app')
@include('layouts.manu.personnel.manu_leave2')
@section('content')

<style>
h1 {
    color: Black;
    text-align: center;
    font-size: 200%;


}

label {
    color: Black;
    text-align: center;
}
</style>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">เเก้ไข การขออนุมัติลา </a>
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
                            <h4 class="card-title">เเก้ไข การขออนุมัติลา</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <form method="POST" action="{{action('LeaveController@update', $id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md">
                                                </div>
                                                <div class="col-md">
                                                    <h1 align='center'>ใบลา</h1>
                                                </div>
                                                <div class="col-md">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group row">
                                                        <label for="text" class="col-md-2 col-form-label">เรื่อง</label>
                                                        <div class="col-md-10 pr-1">
                                                            <input type="text" class="form-control" name="affair"
                                                                id="affair" value="{{$chief->affair}}"
                                                                placeholder="affair" required autocomplete="affair"
                                                                autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 pr-1"></div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group row">
                                                        <label for="text" class="col-md-2 col-form-label">เรียน</label>
                                                        <div class="col-md-10 pr-1">
                                                            <select class="form-control" name="head">
                                                                @foreach($position as $boss1)
                                                                <option value="{{$boss1->idchief}}">
                                                                    {{$boss1->fname}}&nbsp;&nbsp;{{$boss1->lname}}&nbsp;&nbsp;&nbsp;({{$boss1->niname}})
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                                <div class="col-md-4 pr-1">
                                                    <div class="form-group row">
                                                        <label for="text"
                                                            class="col-md-2 pr-1 col-form-label">ชื่อ</label>
                                                        <div class="col-md-8 pr-1">
                                                            <input type="text" class="form-control"
                                                                value="{{$chief->lea_fname}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pr-1">
                                                    <div class="form-group row">
                                                        <label for="text"
                                                            class="col-md-2 pr-1 col-form-label">นามสกุล</label>
                                                        <div class="col-md-8 pr-1">
                                                            <input type="text" class="form-control"
                                                                value="{{$chief->lea_lname}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pr">
                                                    <div class="form-group row">
                                                        <label for="text"
                                                            class="col-md-3 pr-1 col-form-label">ชื่อเล่น</label>
                                                        <div class="col-md-6 pr-1">
                                                            <input class="form-control" type="text"
                                                                value="{{$chief->lea_niname}}" id="example-date-input"
                                                                name="lea_niname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group row">
                                                    <label for="text" class="col-sm-2 col-form-label">ขอลา</label>
                                                    <div class="col-md-8 pr-1">
                                                        <select class="form-control" name="leave">
                                                            @foreach($leave as $ticketl)
                                                            <option>{{$ticketl->sickleave}}</option>
                                                            <option>{{$ticketl->personalleave}}</option>
                                                            <option>{{$ticketl->vacationleave}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group row">
                                                    <label for="text" class="col-sm-2 col-form-label">เนื่องจาก</label>
                                                    <div class="col-md-8 pr-1">
                                                        <input type="text" class="form-control" name="since" id="text"
                                                        value="{{$chief->since}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('layouts.datepicker.date_personalleave')
                                        <button type="submit"
                                            class="btn btn-info btn-fill pull-right">บันทึกข้อมูล</button>
                                        <input type="hidden" name="_method" value="PATCH" />
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection