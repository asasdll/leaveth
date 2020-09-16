@extends('layouts.app')
@include('layouts.manu.personnel.manu_leave2')
@section('content')

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">การขออนุมัติลา </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                        <form  method="POST" action="{{'letter'}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="container">
                                                <div class="row">
                                                        <div class="col-md">
                                                        </div>
                                                    <div class="col-md">
                                                        <h1  align = 'center'>ใบลา</h1>
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
                                                    <label for="text"  class="col-md-2 col-form-label">เรื่อง</label>
                                                    <div class="col-md-10 pr-1">
                                                    <input type="text" class="form-control"   name="affair" id="affair" placeholder="affair" required autocomplete="affair" autofocus>
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
                                                            @foreach($boss as $boss1)
                                                            <option value="{{$boss1->idchief}}">{{$boss1->fname}}&nbsp;&nbsp;{{$boss1->lname}}&nbsp;&nbsp;&nbsp;({{$boss1->niname}})</option>
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
                                                @foreach($status as $ticket)
                                                <div class="row">
                                                <div class="col-md-4 pr-1">
                                                <div class="form-group row">
                                                    <label for="text" class="col-sm-3 col-form-label pull-right">ชื่อ</label>
                                                    <div class="col-md-8 pr-1">
                                                    <input class="form-control" type="text" value="{{$ticket->firstnamebem}}" id="example-date-input" name="lea_fname" >
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col md-4 pr-1">
                                                <div class="form-group row">
                                                    <label for="text" class="col-md-3 pr-1 col-form-label">นามสกลุ</label>
                                                    <div class="col-md-8 pr-1">
                                                    <input class="form-control" type="text" value="{{$ticket->lastnamebem}}" id="example-date-input" name="lea_lname" >
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4 pr">
                                                <div class="form-group row">
                                                    <label for="text" class="col-md-3 pr-1 col-form-label">ชื่อเล่น</label>
                                                    <div class="col-md-6 pr-1">
                                                    <input class="form-control" type="text" value="{{$ticket->nickname}}" id="example-date-input" name="lea_niname" >
                                                    </div>
                                                  </div>
                                                 </div>
                                              </div>
                                              </div>
                                            @endforeach
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
                           
                                            @include('layouts.datepicker.date_date')
                                              <div class="row">
                                                <div class="col-md-6 pr-1">
                                                <div class="form-group row">
                                                    <label for="text" class="col-md-4 pr-1 col-form-label">ในระหว่างลาสมารถติดต่อข้าพเจ้าได้ที่</label>
                                                    <div class="col-md-8 pr-1">
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6 pr-1">
                                                <div class="form-group row">
                                                @foreach($status as $ticket)
                                                    <label for="text" class="col-md-2 pr-1 col-form-label">เบอร์ติดต่อ</label>
                                                    <div class="col-md-6 pr-1">
                                                    <input type="text" class="form-control" name="tel" value="{{$ticket->tel}}" id="tel">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                </div>
                                                <div class="col-md- pr-1">
                                                <div class="form-group">
                                                <input type="file" class="form-control" id="image"  name="image">
                                                </div>
                                                </div>
                                                <div class="col-md-2 pr-1">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">บันทึกข้อมูล</button>
                                        </form>
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