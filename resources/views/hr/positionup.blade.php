@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_position')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('pos')}}">เพิ่มตำเเหน่ง</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            @include('layouts.navbar')
        </div>
    </nav>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link " id="nav-home-tab" href="{{url('pos')}}" role="tab"
                                aria-controls="nav-home" aria-selected="true">ตำเเหน่ง</a>
                            <a class="nav-link active" id="nav-profile-tab" href="{{url('pos_p')}}" role="tab"
                                aria-controls="nav-profile" aria-selected="false">พนักงาน</a>
                            <a class="nav-link" id="nav-contact-tab" href="{{url('pos_c')}}" role="tab"
                                aria-controls="nav-contact" aria-selected="false">หัวหน้า</a>
                        </div>
                    </nav>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h5 class="alert alert-warning">กรุณาเพิ่มตำเเหน่งพนักงาน</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <form method="POST" action="/divsion/{{$ticket->id}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 pr-1">
                                                    <div class="row">
                                                        <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">ชื่อ</label>
                                                            <input type="text" class="form-control" name="fname"
                                                                value="{{$ticket->firstnamebem}}" readonly>
                                                        </div>
                                                        <div class="col-md-2 pr-1">
                                                            <label for="exampleInputEmail1">นามสกุล</label>
                                                            <input type="text" class="form-control" name="lname"
                                                                value="{{$ticket->lastnamebem}}" readonly>
                                                        </div>
                                                        <div class="col-md-1 pr-1">
                                                            <label for="exampleInputEmail1">ชื่อเล่น</label>
                                                            <input type="text" class="form-control" name="niname"
                                                                value="{{$ticket->nickname}}" readonly>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputState">ตำเเหน่ง</label>
                                                            <select id="inputState" class="form-control"
                                                                name="division">
                                                                @foreach($posed as $pod)
                                                                <option selected value="{{$pod->code_division}}">
                                                                    {{$pod->division}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1 pr-1">
                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-info btn-fill pull-left">Add</button>
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

@endsection