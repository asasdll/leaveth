@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_add_date')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">เพิ่มวันลาพนักงาน</a>
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
                    <nav class="navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand">ค้นหา</a>
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{'add_date'}}">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="ค้นหา"
                                aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    <br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <h6 align = 'center'>{{session('success')}}</h6>
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50">ลำดับ</th>
                                <th width="500">ชื่อ - นามสกุล</th>
                                <th width="100">เพิ่ม</th>
                            </tr>
                        </thead>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($add_date as $ticket)
                        <tbody>
                            <tr>
                                <td>@php echo ++$i @endphp</td>
                                <td>{{$ticket->firstnamebem}} &nbsp; &nbsp; &nbsp; &nbsp; {{$ticket->lastnamebem}}</td>
                                <td>
                                    <a class="btn btn-primary" href="/add_/{{$ticket->iduser}}" role="button">เพิ่ม</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection