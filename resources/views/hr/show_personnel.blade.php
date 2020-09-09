@extends('layouts.app')
@section('content')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="newcompany"> Users </a>
                    @include('layouts.navbar')
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">การอนุมัติ</h4>
                                </div>
                                <div class="card-body">
                                <form >
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Company (Code)</label>
                                                    <input type="text" class="form-control" value="{{$ticket->code}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>ชื่อ</label>
                                                    <input type="text" class="form-control"  value="{{$ticket->firstnamebem}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>นามสกุล</label>
                                                    <input type="text" class="form-control" value="{{$ticket->lastnamebem}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>ชื่อเล่น</label>
                                                    <input type="text" class="form-control"  value="{{$ticket->nickname}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>อายุ</label>
                                                    <input type="text" class="form-control"  value="{{$ticket->age}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 pl-1">
                                              <div class="form-group">
                                                  <label>วว/ดด/ปป เกิด</label>
                                                  <input class="form-control" value="{{$ticket->date}}" id="example-date-input" value="{{$ticket->date}}">
                                              </div>
                                          </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>เบอร์ติดต่อ</label>
                                                    <input type="text" class="form-control" value="{{$ticket->tel}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 pr-1">
                                                <div class="form-group">
                                                    <label>เบอร์ติดต่อฉุกเฉิน</label>
                                                    <input type="text" class="form-control" value="{{$ticket->tel2}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>ชื่อเบอร์ติดต่อฉุกเฉิน</label>
                                                    <input type="text" class="form-control" value="{{$ticket->telname2}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 pr-1">
                                                <div class="form-group">
                                                    <label>เบอร์ติดต่อฉุกเฉิน 2</label>
                                                    <input type="text" class="form-control " placeholder="Tel3" value="{{$ticket->tel3}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>ชื่อเบอร์ติดต่อฉุกเฉิน 2</label>
                                                    <input type="text" class="form-control " value="{{$ticket->telname3}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pr-1">
                                          <div class="form-group">
                                            <label for="inputPassword4">ที่อยู่</label>
                                            <input id="name" type="text" class="form-control"value="{{$ticket->address}}">
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>จังหวัด</label>
                                                    <input type="text" class="form-control "value="{{$ticket->city}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>รหัสไปรษณีย์</label>
                                                    <input type="text" class="form-control" value="{{$ticket->postalcode}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label for="inputState">สถานะ</label>
                                                    <input type="text" class="form-control" value="{{$ticket->status2}}">
                                                </div>
                                            </div>
                                        </div>
                                      <a href="{{url('usersprofile')}}" class="btn btn-info btn-fill pull-right" role="button" aria-pressed="true">back</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                  <img src="{{ URL::to('/') }}/img/imgback/large_8.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="{{ URL::to('/') }}/img/profile/{{$ticket->image}}" alt="...">
                                            <h5 class="title">{{$ticket->firstname}}   {{$ticket->lastname}}</h5>
                                        </a>
                                        <p class="description">
                                                 <font color="primary">Tel- {{$ticket->tel}}</font>
                                        </p>

                                    <p class="description text-center">
                                        <br>Tel- {{$ticket->tel2}} {{$ticket->telname2}}
                                        <br> {{$ticket->addresshome}}
                                        <br> {{$ticket->city}} {{$ticket->postalcode}}
                                    </p>
                                </div>
                                  </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @endsection