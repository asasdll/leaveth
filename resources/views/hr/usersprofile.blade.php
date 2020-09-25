@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_usersprofile')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> รายชื่อพนักงาน </a>
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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">รายชื่อพนักงาน</h4>
                                    <p class="card-category">รายชื่อพนักงาน</p>
                                </div>
                              
                                <div class="card-body all-icons">
                                    <div class="row">
                                    @foreach($leave as $ticket)
                                        <div class="col-md-3">
                                            <div class="card card-user">
                                             <div class="card-image">
                                                 <img src="{{ URL::to('/') }}/img/imgback/large_8.jpg" alt="...">
                                            </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="{{action('PhotoController@show',$ticket->id)}}">
                                            <img class="avatar border-gray" src="{{ URL::to('/') }}/img/profile/{{$ticket->image}}" alt="...">

                                        </a>
                                        <p class="description">
                                                 <font color="primary">ชื่อ&nbsp;&nbsp;{{$ticket->firstnamebem}}&nbsp;&nbsp;&nbsp;&nbsp; นามสกุล&nbsp;&nbsp;{{$ticket->lastnamebem}}</font>
                                        </p>
                                    
                                    <p class="description text-center">
                                      Tel-&nbsp;&nbsp; {{$ticket->tel}}
                                    </p>
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
                        @endforeach                       
                    </div>
                </div>
                <?php echo $leave->links();?>
            </div>
            @include('layouts.footer')
        </div>
        @endsection
