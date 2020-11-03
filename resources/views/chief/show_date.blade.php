@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_add_date')
<style>

.right
{
	float:right;
}
</style>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-inline my-2 my-lg-0" method="get" action="/show_date/{{$id_user}}">
                                    <input class="form-control mr-sm-2" name="search_leaves" type="search" placeholder="ค้นหา"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info btn-fill " href="/add_/{{$id_user}}"
                                    role="button">เพิ่มวันลา</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <h6 align='center'>{{session('success')}}</h6>
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50">ลำดับ</th>
                                <th width="500">ประเภทการลา</th>
                                <th width="100">จำนวนวัน</th>
                                <th width="200">เวลา</th>
                                <th width=""></th>
                            </tr>
                        </thead>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($show_date as $ticket)
                        <tbody>
                            <tr>
                                <td>@php echo ++$i @endphp</td>
                                <td>{{$ticket->data_name}} </td>
                                <td>{{$ticket->date_up}}</td>
                                <td>
                                    @php
                                    $time = substr($ticket->created_at,0,-8);
                                    @endphp
                                    {{$time}}
                                </td>
                                <td>
                                    <a class="btn btn-info btn-fill" href="/add_edit/{{$ticket->id}}"
                                        role="button">เพิ่ม/เเก้ไข</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <?php echo $show_date->links();?>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection