@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_position')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{url('pos')}}">เพิ่มตำเเหน่ง</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    @include('layouts.navbar')
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h5 class="alert alert-warning">กรุณาเพิ่มพนักงานในตำเเหน่งต่าง</h4>
                                    <p class="card-category">เพิ่มพนักงานในตำเเหน่ง</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">          
                                    <table class="table table-hover table-striped">
                                      <tbody>
                                        <form method="POST" action="{{action('PositionController@store')}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 pr-1">
                                                     <div class="row">
                                                            <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">codecompany</label>
                                                                <input type="text" class="form-control" name="codecom" value="{{$ticket->code}}" readonly>
                                                            </div>
                                                            <div class="col-md-1 pr-1">
                                                            <label for="exampleInputEmail1">idchief</label>
                                                                <input type="text" class="form-control" name="idchief" value="{{$ticket->iduser}}" readonly>
                                                            </div>
                                                            <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">ชื่อ</label>
                                                                <input type="text" class="form-control" name="fname" value="{{$ticket->firstnamebem}}" readonly>
                                                            </div>
                                                            <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">นามสกุล</label>
                                                                <input type="text" class="form-control" name="lname"  value="{{$ticket->lastnamebem}}" readonly>
                                                            </div>
                                                            <div class="col-md-1 pr-1">
                                                            <label for="exampleInputEmail1">ชื่อเล่น</label>
                                                                <input type="text" class="form-control" name="niname" value="{{$ticket->nickname}}" readonly>
                                                            </div>
                                                            <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">ตำเเหน่ง</label>
                                                                <input type="text" class="form-control" name="position" placeholder="Last name" required>
                                                            </div>
                                                        
                                                            <div class="col-md-1 pr-1">
                                                            <br>
                                                            <button type="submit" class="btn btn-info btn-fill pull-left">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            @include('layouts.footer')
        </div>
    </div>
    @endsection