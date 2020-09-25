@extends('layouts.app')
@section('content')
@include('layouts.manu.personnel.manu_leave2')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">การขออนุมัติลา</a>
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
                            @php
                            $idcode = empty($code_id[0]->id) ? '' : $code_id[0]->id;
                            @endphp
                            <form align='center' method="POST" action="code_herd/{{$idcode}}">
                                @csrf
                                <div class="form-group">
                                    @if(session('success'))
                                    <div class="alert alert-warning" role="alert">
                                        {!! \Session::get('success') !!}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </div>
                                    @endif
                                    <label for="exampleInputEmail1">รหัสแผนก</label>
                                    <input type="text" class="form-control" name="code_herd" required>
                                    <small id="emailHelp" class="form-text text-muted">ขอรหัสได้จากหัวหน้าแผนก</small>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>
                                </div>
                            </form>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection