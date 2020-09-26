@extends('layouts.app')
@section('content')
@include('layouts.manu.personnel.manu_leave3')
        <script type="text/javascript">


        // Show function
            $(document).on('click', '.show-modal', function() {
            $('#show').modal('show');
            $('#i').text($(this).data('id'));
            $('#af').text($(this).data('affair'));
            $('#he').text($(this).data('head'));
            $('#fi').text($(this).data('lea_fname'));
            $('#la').text($(this).data('lea_lname'));
            $('#pt').text($(this).data('position'));
            $('#le').text($(this).data('leave'));
            $('#si').text($(this).data('since'));
            $('#dt1').text($(this).data('date1'));
            $('#dt2').text($(this).data('date2'));
            $('#d').text($(this).data('da'));
            $('#ad').text($(this).data('address'));
            $('#t').text($(this).data('tel'));
            $('#sc').text($(this).data('status_chief'));
            $('#st1').text($(this).data('status_text1'));
            $('#sh').text($(this).data('status_hr'));
            $('#st2').text($(this).data('status_text2'));
            $('.exampleModal').text('Show Post');
            });

        </script>
    <script type="text/javascript">


// Show function
    $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#i2').text($(this).data('id'));
    $('#af2').text($(this).data('affair'));
    $('#he2').text($(this).data('head'));
    $('#fi2').text($(this).data('lea_fname'));
    $('#la2').text($(this).data('lea_lname'));
    $('#pt2').text($(this).data('position'));
    $('#le2').text($(this).data('leave'));
    $('#si2').text($(this).data('since'));
    $('#dt12').text($(this).data('date1'));
    $('#dt22').text($(this).data('date2'));
    $('#d2').text($(this).data('da'));
    $('#ad2').text($(this).data('address'));
    $('#t2').text($(this).data('tel'));
    $('#sc2').text($(this).data('status_chief'));
    $('#st12').text($(this).data('status_text1'));
    $('#sh2').text($(this).data('status_hr'));
    $('#st22').text($(this).data('status_text2'));
    $('.example').text('Show Post');
    });

</script>
        <style>
        /*-----font ----*/
         b {
                font-weight: lighter;
            }

            label {
                font-weight: lighter;
            }
        #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.3); /* Black w/ opacity */
            }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            width: 100%;
            max-width: 1300px;
        }

        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }
    </style>

    
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> ผลการขออนุมัติลา</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    @include('layouts.navbar')
                </div>
            </nav>
            <!-----End Navbar---->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">กำลังรอการอนุมัติ</h4>
                                    <p class="card-category">กำลังรอการอนุมัติ</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                    <thead>
                                            <th>id</th>
                                            <th>id2</th>
                                            <th>เรื่อง</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ประเภทการลา</th>
                                            <th>Image</th>
                                            <th>ผลการอนุมัติ</th>
                                        </thead>
                                        <tbody>
                                        @php 
                                         $i = 0;
                                        @endphp
                                        @foreach($leave as $ticket1)
                                            <tr>
                                                <td>@php echo ++$i @endphp</td>
                                                <td>{{$ticket1->id}}</td>
                                                <td>{{$ticket1->affair}}</td>
                                                <td>{{$ticket1->lea_fname}}</td>
                                                <td>{{$ticket1->lea_lname}}</td>
                                                <td>{{$ticket1->leave}}</td>
                                                <td>
                                                    <div id="image">
                                                        <a href="#modal" data-toggle="modal" data-target="#modalimage">
                                                            <img id="myImg" src="{{ URL::to('/') }}/img/file/{{$ticket1->image}}" width="30px" height="30px"/>
                                                        </a>
                                                    </div>
                                              </td>  
                                                <td><label style="color:#0000FF">กำลังรอการอนุมัติ</label></td>
                                                <td><a class="show-modal btn btn-info btn-fill pull-right"  href="#" 
                                                    data-id="{{$ticket1->id}}" data-affair="{{$ticket1->affair}}" data-head="{{$ticket1->fname}}&nbsp;&nbsp;&nbsp;{{$ticket1->lname}}&nbsp;&nbsp;&nbsp;({{$ticket1->niname}})" 
                                                    data-lea_fname="{{$ticket1->lea_fname}}" data-lea_lname="{{$ticket1->lea_lname}} &nbsp;&nbsp;&nbsp; ({{$ticket1->lea_niname}})" data-position="{{$ticket1->position}}"
                                                    data-leave="{{$ticket1->leave}}" data-since="{{$ticket1->since}}" data-date1="{{$ticket1->date1}}" data-date2="{{$ticket1->date2}}"
                                                    data-da="{{$ticket1->da}}" data-address="{{$ticket1->address}}" data-tel="{{$ticket1->tel}}"  data-status_chief="{{$ticket1->status_chief}}"  data-status_hr="{{$ticket1->status_hr}}" data-toggle="modal" data-target="#exampleModal">View</a></td>         
                                                <td><a class="btn btn-info btn-fill pull-right" href="{{route('letter.edit',$ticket1->id) }}"  role="button">เเก้ไข</a></td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">ผลการอนุมัติ</h4>
                                    <p class="card-category">ผลการอนุมัติ</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>id</th>
                                            <th>เรื่อง</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ประเภทการลา</th>
                                            <th>Image</th>
                                            <th>ผลการอนุมัติ</th>
                                        </thead>
                                        <tbody>
                                        @php
                                         $i = 0;
                                        @endphp
                                        @foreach($leave2 as $ticket2)
                                            <tr>
                                                <td>@php echo ++$i @endphp</td>
                                                <td>{{$ticket2->affair}}</td>
                                                <td>{{$ticket2->lea_fname}}</td>
                                                <td>{{$ticket2->lea_lname}}</td>
                                                <td>{{$ticket2->leave}}</td>
                                                <td>
                                                    <div id="image">
                                                        <a href="#modal" data-toggle="modal" data-target="#modalimage">
                                                            <img id="myImg" src="{{ URL::to('/') }}/img/file/{{$ticket2->image}}" width="30px" height="30px"/>
                                                        </a>
                                                    </div>
                                                </td>
                                                 @php
                                                 $sts = $ticket2->status_hr
                                                @endphp
                                                <td>@if ($sts === 'อนุมัติ')
                                                         <label style="color:#00FF00">อนุมัติ</label>
                                                    @else
                                                    <label style="color:#FF0000">ไม่อนุมัติ</label>
                                                    @endif</td>
                                                <td><a class="show-modal btn btn-info btn-fill pull-right"  href="#" 
                                                    data-id="{{$ticket2->id}}" data-affair="{{$ticket2->affair}}" data-head="{{$ticket2->fname}}&nbsp;&nbsp;&nbsp;{{$ticket2->lname}}&nbsp;&nbsp;&nbsp;({{$ticket2->niname}})" 
                                                    data-lea_fname="{{$ticket2->lea_fname}}" data-lea_lname="{{$ticket2->lea_lname}} &nbsp;&nbsp;&nbsp; ({{$ticket2->lea_niname}})" data-position="{{$ticket2->position}}"
                                                    data-leave="{{$ticket2->leave}}" data-since="{{$ticket2->since}}" data-date1="{{$ticket2->date1}}" data-date2="{{$ticket2->date2}}"
                                                    data-da="{{$ticket2->da}}" data-address="{{$ticket2->address}}" data-tel="{{$ticket2->tel}}"  data-image="{{$ticket2->image}}"
                                                    data-status_chief="{{$ticket2->status_chief}}" data-status_text1="{{$ticket2->status_text1}}" data-status_hr="{{$ticket2->status_hr}}"  data-status_text2="{{$ticket2->status_text2}}"
                                                data-toggle="modal" data-target="#example">View</a></td>         
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                    <?php echo $leave2->links();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
            <!-- Modal กำลังรอการอนุมัติ-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">กำลังรอการอนุมัติ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label for="">ID :</label>
                               <b id="i"/>
                            </div>
                            <div class="form-group">
                                <label for="">เรื่อง :</label>
                               <b id="af"/>
                            </div>
                            <div class="form-group">
                                <label for="">ชื่อหัวหน้า :</label>
                                <b id="he"/>
                            </div>
                            <div class="form-group">
                                <label for="">ชื่อ นามสกุล :</label>
                                <a-l><b id="fi"/></a-l><a-l>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="la"/></a-l>
                            </div>
                            <div class="form-group">
                                <label for="">ตำเเหน่ง :</label>
                               <b id="pt"/>
                            </div>
                            <div class="form-group">
                                <label for="">ประเภทการ :</label>
                                <b id="le"/>
                            </div>
                            <div class="form-group">
                                <label for="">เนื่่องจาก :</label>
                                <b id="si"/>
                            </div>
                            <div class="form-group">
                                <label for="">ตั้งเเต่- จนถึง :</label>
                                <a-l><b id="dt1"/></a-l><a-l>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<b id="dt2"/></a-l>
                            </div>
                            <div class="form-group">
                                <label for="">ลาทั้งหมด :</label>
                                <b id="d"/>
                                <label for=""> วัน </label>
                            </div>
                            <div class="form-group">
                                <label for="">ที่อยู่ขณะที่ลา :</label>
                                <b id="ad"/>
                            </div>
                            <div class="form-group">
                                <label for="">เบอร์ติดต่อ :</label>
                                <b id="t"/>
                            </div>
                            <div class="form-group">
                                <label for="">รอการอนุมัติ หัวหน้า:</label>
                                <b id="sc2"/>
                            </div>
                            <div class="form-group">
                                <label for="">รอการอนุมัติ HR:</label>
                                <b id="sh2"/>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        <!---END-- Modal -->
         <!-- Modal -->
            <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ผลการอนุมัติ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label for="">ID :</label>
                               <b id="i2"/>
                            </div>
                            <div class="form-group">
                                <label for="">เรื่อง :</label>
                               <b id="a2f"/>
                            </div>
                            <div class="form-group">
                                <label for="">ชื่อหัวหน้า :</label>
                                <b id="he2"/>
                            </div>
                            <div class="form-group">
                                <label for="">ชื่อ นามสกุล :</label>
                                <a-l><b id="fi2"/></a-l><a-l>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="la2"/></a-l>
                            </div>
                            <div class="form-group">
                                <label for="">ตำเเหน่ง :</label>
                               <b id="pt2"/>
                            </div>
                            <div class="form-group">
                                <label for="">ประเภทการ :</label>
                                <b id="le2"/>
                            </div>
                            <div class="form-group">
                                <label for="">เนื่่องจาก :</label>
                                <b id="si2"/>
                            </div>
                            <div class="form-group">
                                <label for="">ตั้งเเต่- จนถึง :</label>
                                <a-l><b id="dt12"/></a-l><a-l>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<b id="dt22"/></a-l>
                            </div>
                            <div class="form-group">
                                <label for="">ลาทั้งหมด :</label>
                                <b id="d2"/>
                                <label for=""> วัน </label>
                            </div>
                            <div class="form-group">
                                <label for="">ที่อยู่ขณะที่ลา :</label>
                                <b id="ad2"/>
                            </div>
                            <div class="form-group">
                                <label for="">เบอร์ติดต่อ :</label>
                                <b id="t2"/>
                            </div>
                            <div class="form-group">
                                <label for="">การอนุมัติ หัวหน้า :</label>
                                <b id="sc"/>
                            </div>
                            <div class="form-group">
                                <label for="">การอนุมัติ HR :</label>
                                <b id="sh"/>
                            </div>
                    </div>
                </div>
            </div>
            </div>

        <!---- Modal  Img -->
        <div> 
           <div class="modal fade " id="modalimage" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <img  class="modal-img"/>
                    </div>
               </div>
            </div>
        </div>

<!--   Core JS Files   -->
<script>
    $(function(){
    $("#image img").on("click",function(){
        var src = $(this).attr("src");
        $(".modal-img").prop("src",src);
    })
    })
</script>
@endsection
