@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_position')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="pos">เเก้ไขตำเเหน่ง</a>
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
    <!-- End Navbar -->
    <div class="">
        <div class="">
            <div class="">
                <div class="col-md-12">

                <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link " id="nav-home-tab" href="{{url('pos')}}" role="tab"
                                aria-controls="nav-home" aria-selected="true">ตำเเหน่ง</a>
                            <a class="nav-link active"  id="nav-profile-tab" href="{{url('pos_p')}}" role="tab"
                                aria-controls="nav-profile" aria-selected="false">พนักงาน</a>
                            <a class="nav-link" id="nav-contact-tab" href="{{url('pos_c')}}" role="tab"
                                aria-controls="nav-contact" aria-selected="false">หัวหน้า</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">

                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card strpied-tabled-with-hover">
                                                <div class="card-header ">
                                                    <h5 class="alert alert-warning">กรุณาเเก้ไขชื่อตำเเหน่ง
                                                        @if(session('success'))
                                                        <p align='center' style="color:#008000">{{session('success')}}
                                                        </p>
                                                        @endif
                                                        </h4>
                                                </div>
                                                <div class="card-body table-full-width table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <tbody>
                                                            <form method="POST"
                                                                action="{{action('PositionController@update',$id)}}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12 pr-1">
                                                                            <div class="row">
                                                                                <div class="col-md-6 pr-1">
                                                                                    <label
                                                                                        for="exampleInputEmail1">ตำเเหน่ง</label>
                                                                                    @foreach($posed as $pod)
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="position"
                                                                                        value="{{$pod->division}}">
                                                                                        @endforeach
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
                                                                <input type="hidden" name="_method" value="PATCH" />
                                                            </form>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
<style>
hia {
    width: 500px;

}
</style>
@endsection