@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_position')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="pos">เพิ่มเเผนกพนักงาน</a>
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
                            <a class="nav-link active" id="nav-profile-tab" href="{{url('pos_p')}}" role="tab"
                                aria-controls="nav-profile" aria-selected="false">พนักงาน</a>
                            <a class="nav-link" id="nav-contact-tab" href="{{url('pos_c')}}" role="tab"
                                aria-controls="nav-contact" aria-selected="false">หัวหน้า</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h5 class="alert alert-warning">เพิ่มเเผนกพนักงาน
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
                                    @if(\Session::has('successt'))
                                    <p class="alert alert-danger" align='center'>{{\Session::get('successt')}}</p>
                                    @endif
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover ">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                        <th>ชื่อเล่น</th>
                                                    </thead>
                                                    <div class="row">
                                                        @php
                                                        $i = 0;
                                                        @endphp
                                                        @foreach($status as $ticket)
                                                        <tbody>
                                                            <tr>
                                                                <td>@php echo ++$i @endphp</td>
                                                                <td>{{$ticket->firstnamebem}}</td>
                                                                <td>{{$ticket->lastnamebem}}</td>
                                                                <td>{{$ticket->nickname}}</td>
                                                                <td><a class="btn btn-info btn-fill pull-right"
                                                                        href="{{ route('AAA.show',$ticket->id) }}"
                                                                        role="button">เพิ่ม</a></td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $status->links();?>
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
                                                        <th>แผนก</th>
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
                                                                        href="/p_div/{{$pass->iduser}}"
                                                                        role="button">เเก้ไข</a>
                                                                </td>
                                                                <td>
                                                                    <form method="get" class="delete_form pull-right"
                                                                        action="{{action('PositionController@p_d_div',$pass->iduser)}}">
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
                                    <?php echo $status->links();?>
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