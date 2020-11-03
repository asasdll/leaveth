@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_add_date')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">เเเก้ไขวันลา</a>
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
                            
                            <form align='center' method="POST" action="{{url('up_date',$id_user)}}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label for="staticEmail" align='right'
                                            class="col-sm-4 col-form-label">วันลา{{$id_user}}</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="name_lv">
                                            @if($reg->data_name == 'ลากิจ')
                                                 <option value="{{$reg->data_name}}">{{$reg->data_name}}</option>
                                                 <option value="ลาพักร้อน">ลาพักร้อน</option>
                                               @else
                                                <option value="{{$reg->data_name}}">{{$reg->data_name}}</option>
                                                    <option value="ลาพักร้อน">ลากิจ</option>
                                               @endif   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" align='right'
                                            class="col-sm-4 col-form-label">จำนวนวันลา</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"   Value="{{$reg->date_up}}" name="date_add">
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