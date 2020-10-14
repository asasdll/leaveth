@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_table')
@include('layouts.function')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">ประวัติการบันทึกเวลา </a>
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
                                    <h4 class="card-title">ประวติการบันทึกเวลา</h4>
                                    <p class="card-category">ประวติการบันทึกเวลา</p>
                                    <form class="form-inline  pull-right my-2 my-lg-0" method="POST"
                                        action="{{'search_time'}}">
                                        @csrf
                                        <input class="form-control mr-sm-2" type="search" name="search_name"
                                            placeholder="Search_name" aria-label="Search">
                                        <div class="form-group row">
                                            <label for="example-month-input" class="col-sm-2 col-form-label">Month</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mr-sm-2" type="month" value="วว/ดด/ปป"
                                                    name="search_date" id="example-month-input">
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-info form-control mr-sm-2" type="submit">ค้นหา</button>
                                    </form>
                                    @php
                                        $name_pdf = empty($name) ? '' : $name;
                                        $date_pdf = empty($date) ? '' : $date;
                                    @endphp

                                    @if($name_pdf != "" || $date_pdf != "" )
                                                
                                            
                                            @if($name = "$name_pdf" and	$date = "$date_pdf")
                                         
                                                <a  target ="_blank" href="/pdf/{{$name_pdf}}/{{$date_pdf}}"   class="btn btn-outline-info" role="button" aria-pressed="true">PDF</a>
                                            
                                            @elseif ($date = "$date_pdf")

                                                <a  target ="_blank" href="/date_pdf/{{$date}}"   class="btn btn-outline-info" role="button" aria-pressed="true">PDF</a>
                                            
                                            @elseif ($name = $name_pdf)

                                                <a  target ="_blank" href="/name_pdf/{{$name}}"   class="btn btn-outline-info" role="button" aria-pressed="true">PDF</a>

                                            @endif
                                    @else
                                        <a  target ="_blank" href="{{url('pdf2') }}"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-info" role="button" aria-pressed="true">PDF</a>
                                        
                                    @endif
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
                                            <th>รวมเวลา</th>
                                            <th>เข้างานสาย</th>
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
                                               @php
                                                         $rest = substr("{{$ticket->time_in}}", 4, 2)
                                                    @endphp

                                         @if($ticket->time_out == "")
                                            
                                        @else
                                                @if($rest === '00')
                                                    <td><font color="#32CD32">{{$rest}}</font></td>
                                                @else
                                                    <td><font color="#FF0000">{{$rest}}</font></td>
                                                @endif 
                                        @endif
                                             
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 color="red"  align = 'center'>ข้อมูลขนาดใหญ่เกินไปกรุณา "ค้นหาก่อน"</h5>
      <br>
      </div>
    </div>
  </div>
</div>

    <!--   -->
    @endsection