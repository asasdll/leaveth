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
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">เเก้ไขตำเเหน่งพนักงาน</h4>
                                    <p class="card-category">เเก้ไขตำเเหน่งพนักงาน</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                      <tbody>
                                        <form   method="POST" action="{{action('PositionController@update',$id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 -pr-1">
                                                     <div class="row">
                                                     @foreach($ticket as $ticket2)
                                                     <div class="col-md-1 -pr-1">
                                                            <label for="exampleInputEmail1">id</label>
                                                                <input type="text" class="form-control"  value="{{$ticket2->id}}" readonly>
                                                            </div>
                                                            <div class="col-md-1 -pr-1">
                                                            <label for="exampleInputEmail1">idchief</label>
                                                                <input type="text" class="form-control"  value="{{$ticket2->idchief}}" readonly>
                                                            </div>
                                                            <div class="col-md-3 -pr-1">
                                                            <label for="exampleInputEmail1">ชื่อ นามสกุล</label>
                                                            <input type="text" class="form-control"  value="{{$ticket2->firstnamebem}}&nbsp;&nbsp;&nbsp;{{$ticket2->lastnamebem}}&nbsp;&nbsp;&nbsp;&nbsp; ({{$ticket2->nickname}})" readonly>
                                                            </div>
                                                            @endforeach
                                                            <div class="col-md-4 -pr-1">
                                                            <label for="exampleInputEmail1">ตำเเหน่ง</label>
                                                            <input type="text" class="form-control" name="position" value="{{$ticket2->position}}" required>
                                                            </div>
                                                            <div class="col-md-2 -pr-1">
                                                            <br>
                                                            <button type="submit" class="btn btn-info btn-fill pull-left">บันทึกข้อมูล</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </tbody>
                                    </table>
                                    <input type="hidden" name="_method" value="PATCH" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
        @endsection

