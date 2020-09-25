@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_table')
@include('layouts.function')

@include('layouts.navbar')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">ประวัติการลงเวลา</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{'logout'}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">ประวัติการลงเวลา</h4>
                                    <p class="card-category">ประวัติการลงเวลา</p>
                                    <form class="form-inline  pull-right my-2 my-lg-0" method="get" action="{{'search_time_chief'}}">
                                    <div class="form-group row">
                                            <label for="example-month-input" class="col-xl-2 col-form-label">Month</label>
                                            <div class="col-xl-10">
                                                <input class="form-control mr-xl-2" type="month" value="วว/ดด/ปป"
                                                    name="search_date" id="example-month-input">
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-info form-control mr-xl-2" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
					    <th>วันที่</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>เข้างาน</th>
                                            <th>ออกงาน</th>
                                        </thead>
                                        @php
                                           $i = 0;
                                        @endphp
                                          @foreach($user_aaa as $ticket)
                                        <tbody>
                                            <tr>
                                                <td>@php echo ++$i @endphp</td>
						                        <td>{{$ticket->time_date}}</td>
                                                <td>{{$ticket->firstnamebem}}</td>
                                                <td>{{$ticket->lastnamebem}}</td>
                                                <td>{{$ticket->time_in}}</td>
                                                <td>{{$ticket->time_out}}</td>
                                                <td>
                                                @if($ticket->time_out != "")
                                               
                                               @php
                                               $time_a="$ticket->time_in";
                                               $time_b="$ticket->time_out";
                                               @endphp    
                                               {{diff2time($time_a,$time_b)}} 

                                               @elseif($ticket->time_out == "")
                                               <font color="red">{{'ยังลงเวลาไม่ครบ'}}</font>
                                               @endif              
                                               </td>

                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <?php echo $user_aaa->links();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!--   -->
    @endsection
