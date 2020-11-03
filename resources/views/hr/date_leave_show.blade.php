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
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <p align='center'>{{session('success')}}</p>
                    </div>
                    @endif
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Navbar</a>
                        <a class="btn btn-info" href="/add_lea_top" role="button">เพิ่มการลา</a>
                    </nav>
                    <br>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">จำนวนลากิจ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">จำนวนลาพักร้อน</th>
                                <th scope="col">ประจำปี</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($id_leave as $ticket1)
                            <tr>
                                <th>@php echo++$i @endphp</th>
                                <td>{{$ticket1->personalleave}}</td>
                                <td>{{$ticket1->personalleave_date}}</td>
                                <td>{{$ticket1->vacationleave}}</td>
                                <td>{{$ticket1->vacationleave_date}}</td>
                                <td>@php  
                                        $time = substr($ticket1->created_at, 0 ,4);
                                    @endphp 
                                    {{$time}}
                                </td>
                                <td><a href="{{action('Date_leaveController@edit',$ticket1->id)}}"
                                        class="btn btn-info btn-fill pull-right" role="button"
                                        aria-pressed="true">เเก้ไข</a>
                                    <div class="clearfix">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection