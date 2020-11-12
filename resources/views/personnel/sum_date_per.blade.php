@extends('layouts.app')
@section('content')
@include('layouts.manu.personnel.manu_sum')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">ประวัติการลา</a>
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
                    <table class="table table-bordered">
                    <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>วันลา/วัน</th>
                                <th>วันนลาที่เพิ่ม/วัน</th>
                                <th>วันลารวม/วัน</th>
                                <th>จำนวนคนวนวันลาที่ใช้</th>
                                <th>วันลาที่เหลือ/วัน</th>
                            </tr>
                        </thead>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($save_data as $ticket)
                        <tbody>
                            <tr>
                                <td>{{$ticket->personalleave}}</td>
                                <td>{{$ticket->personalleave_date}}</td>
                                <td>{{$ticket->personal_date}}</td>
                                <td>{{$ticket->per_date_sum}}</td>
                                <td>{{$ticket->per_date_user}}</td>
                                <td>
                                    @if($ticket->per_date_surplus >= "0" )
                                    {{$ticket->leave_date_surplus}}
                                    @else()
                                    <font color="#663399">{{'ไม่มีกำการกำหนดวันลา'}}</font>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{$ticket->vacationleave}}</td>
                                <td>{{$ticket->vacationleave_date}}</td>
                                <td>{{$ticket->vacation_date}}</td>
                                <td>{{$ticket->vac_date_sum}}</td>
                                <td>{{$ticket->vac_date_user}}</td>
                                <td>
                                    @if($ticket->vac_date_surplus >= "0" )
                                    {{$ticket->leave_date_surplus}}
                                    @else()
                                    <font color="#663399">{{'ไม่มีกำการกำหนดวันลา'}}</font>
                                    @endif
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