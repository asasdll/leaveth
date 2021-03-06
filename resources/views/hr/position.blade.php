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
                            <a class="nav-link active " id="nav-home-tab" data-toggle="tab" href="{{url('pos')}}"
                                role="tab" aria-controls="nav-home" aria-selected="true">ตำเเหน่ง</a>
                            <a class="nav-link " id="nav-profile-tab" href="{{url('pos_p')}}"
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
                                                    <h5 class="alert alert-warning">กรุณาเพิ่มเเผนก
                                                        @if(session('success'))
                                                        <p align='center' style="color:#008000">{{session('success')}}
                                                        </p>
                                                        @endif
                                                    </h5>
                                                </div>
                                                <div class="card-body table-full-width table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <tbody>
                                                            <form method="POST"
                                                                action="{{action('PositionController@store')}}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12 pr-1">
                                                                            <div class="row">
                                                                                <div class="col-md-6 pr-1">
                                                                                    <label
                                                                                        for="exampleInputEmail1">ตำเเหน่ง</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="position">
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

                            <div class="">
                                <h5 class="alert alert-warning">เเผนก</h4>
                                    <br>
                                    <form class="form-inline  pull-left my-2 my-lg-0" method="get" action="{{'pos'}}">
                                        <input class="form-control mr-sm-2" type="search" name="Search"
                                            placeholder="Search" aria-label="Search">
                                        <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                            </div>
                            <div class="card-body table-full-dark table-responsive">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>แผนก</th>
                                                </thead>
                                                <div class="row">
                                                    @php
                                                    $i = 0;
                                                    @endphp
                                                    @foreach($posed as $pos)
                                                    <tbody>
                                                        <tr>
                                                            <td>@php echo ++$i @endphp</td>
                                                            <td>{{$pos->division}}</td>
                                                            <td><a class="btn btn-info btn-fill pull-right"
                                                                    href="{{ route('AAA.edit',$pos->id) }}"
                                                                    role="button">เเก้ไข</a></td>

                                                            <td>
                                                                <form method="post" class="delete_form pull-left"
                                                                    action="{{action('PositionController@destroy',$pos->id)}}">
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
                                <?php echo $posed->links();?>
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