@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_position')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="pos">เพิ่มตำเเหน่ง</a>
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
    <div class="">
        <div class="">
            <div class="">
                <div class="col-md-12">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link " id="nav-home-tab" href="{{url('pos')}}" role="tab"
                                aria-controls="nav-home" aria-selected="true">ตำเเหน่ง</a>
                            <a class="nav-link atcive" id="nav-profile-tab" href="{{url('pos_p')}}" role="tab"
                                aria-controls="nav-profile" aria-selected="false">พนักงาน</a>
                            <a class="nav-link active" id="contact-tab" data-toggle="tab" href="{{url('pos_c')}}" role="tab"
                                aria-controls="contact" aria-selected="false">หัวหน้า</a>
                         
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-contact" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h5 class="alert alert-warning">เพิ่มตำเเหน่งพนักงาน
                                        @if(session('success'))
                                        <p align='center' style="color:#008000">{{session('success')}}
                                        </p>
                                        @endif
                                    </h5>
                                    <br>
                                    <form class="form-inline  pull-right my-2 my-lg-0" method="get"
                                        action="{{'pos_p'}}">
                                        <input class="form-control mr-sm-2" type="search" name="Search"
                                            placeholder="Search" aria-label="Search">
                                        <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="card-body table-full-dark table-responsive">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover ">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                        <th>ตำเเหน่ง</th>
                                                    </thead>
                                                    <div class="row">
                                                        @php
                                                        $j = 0;
                                                        @endphp
                                                        @foreach($pass_div as $pass)

                                                        <tbody>
                                                            <tr>
                                                                <td>@php echo ++$j @endphp</td>
                                                                <td>{{$pass->firstnamebem}}</td>
                                                                <td>{{$pass->lastnamebem}}</td>
                                                                <td>{{$pass->division}}</td>
                                                                <td>
                                                                    <a class="btn btn-primary pull-right"
                                                                        href="/pos_c_up/{{$pass->iduser}}-{{$pass->id}}"
                                                                        onclick="return confirm('คุณแน่ใจหรือว่าจะตั้งเป็นหัวหน้า')"
                                                                        role="button">ตั้งเป็นหัวหน้า</a>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $pass_div->links();?>
                                </div>
                                <div class="card-body table-full-dark table-responsive">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover ">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                        <th>ตำเเหน่ง</th>
                                                    </thead>
                                                    <div class="row">
                                                        @php
                                                        $i = 0;
                                                        @endphp
                                                        @foreach($pass_pos as $pass_p)

                                                        <tbody>
                                                            <tr>
                                                                <td>@php echo ++$i @endphp</td>
                                                                <td>{{$pass_p->firstnamebem}}</td>
                                                                <td>{{$pass_p->lastnamebem}}</td>
                                                                <td>{{$pass_p->division}}</td>
                                                                <td>
                                                                    <form method="get" class="delete_form pull-right"
                                                                        action="/pos_c_d/{{$pass_p->id_user}}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_method"
                                                                            value="DELETE" />

                                                                        <button type="submit"
                                                                            onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบ')"
                                                                            class="btn btn-danger">ลบ</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $pass_div->links();?>
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