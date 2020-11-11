@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_add_date')

<script type="text/javascript">

// Show function
$(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    /*$('#i').text($(this).data('id'));
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
    $('#dt').text($(this).data('datoo'));
    $('#ad').text($(this).data('address'));
    $('#t').text($(this).data('tel'));
    $('#sc').text($(this).data('status_chief'));
    $('#st1').text($(this).data('status_text1'));
    $('#sh').text($(this).data('status_hr'));
    $('#st2').text($(this).data('status_text2'));*/

    $('#i').text($(this).data('id'));
    $('#per').text($(this).data("personalleave"));
    $('#ped').text($(this).data('personalleave_date'));
    $('#vac').text($(this).data('vacationleave'));
    $('#vacd').text($(this).data('vacationleave_date'));
    $('#psum').text($(this).data('per_date_sum'));
    $('#psu').text($(this).data('per_date_user'));
    $('#pdsp').text($(this).data('per_date_surplus'));
    $('#vsum').text($(this).data('vac_date_sum'));
    $('#vsu').text($(this).data('vac_date_user'));
    $('#vdsp').text($(this).data('vac_date_surplus'));
    $('#pd').text($(this).data('personal_date'));
    $('#vd').text($(this).data('vacation_date'));
    $('.exampleModal').text('Show Post');
});
</script>



<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">เพิ่มวันลาพนักงาน</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            @include('layouts.navbar')
        </div>
    </nav>
    <!-- Button trigger modal -->


    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand">ค้นหา</a>
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{'add_date'}}">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="ค้นหา"
                                aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    <br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <h6 align='center'>{{session('success')}}</h6>
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50">ลำดับ</th>
                                <th width="500">ชื่อ - นามสกุล</th>
                                <th width="450"></th>
                                <th width="200"></th>

                            </tr>
                        </thead>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($add_date as $ticket)
                        <tbody>
                            <tr>
                                <td>@php echo ++$i @endphp</td>
                                <td>{{$ticket->firstnamebem}} &nbsp; &nbsp; &nbsp; &nbsp; {{$ticket->lastnamebem}}</td>
                                <td><a class="show-modal btn btn-info btn-fill pull-right" href="#"
                                        data-id="{{$ticket->firstnamebem}} &nbsp; {{$ticket->lastnamebem}}"
                                        data-personalleave="{{$ticket->personalleave}}"
                                        data-personalleave_date="{{$ticket->personalleave_date}}"
                                        data-vacationleave="{{$ticket->vacationleave}}"
                                        data-vacationleave_date="{{$ticket->vacationleave_date}}"
                                        data-per_date_sum="{{$ticket->per_date_sum}}"
                                        data-per_date_user="{{$ticket->per_date_user}}"
                                        data-per_date_surplus="{{$ticket->per_date_surplus}}"
                                        data-vac_date_sum="{{$ticket->vac_date_sum}}"
                                        data-vac_date_user="{{$ticket->vac_date_user}}"
                                        data-vac_date_surplus="{{$ticket->vac_date_surplus}}"
                                        data-personal_date="{{$ticket->personal_date}}"
                                        data-vacation_date="{{$ticket->vacation_date}}" data-toggle="modal"
                                        data-target="#exampleModal">
                                        view
                                    </a></td>
                                <td><a class="btn btn-info btn-fill" href="/show_date/{{$ticket->iduser}}"
                                        role="button">เพิ่มวันลา</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ชื่อ - นามสกุล &nbsp; &nbsp; <b id="i" /></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">จำนวนวันลาบริษัท</th>
                            <th scope="col">วันลาที่เพิ่ม</th>
                            <th scope="col">วันลาทั้งหมด</th>
                            <th scope="col">จำนวนที่ใช้ลา</th>
                            <th scope="col">จำนวนวันลาที่เหลือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><b id="per" /></th>
                            <td><b id="ped" /></td>
                            <td><b id="pd" /></td>
                            <td<b id="psum" /></td>
                            <td<b id="psu" /></td>
                            <td<b id="pdsp" /></td>
                        </tr>
                        <tr>
                        <th scope="row"><b id="vac" /></th>
                            <td><b id="vacd" /></td>
                            <td><b id="vd" /></td>
                            <td<b id="vsum" /></td>
                            <td<b id="vsu" /></td>
                            <td<b id="vdsp" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $("#image img").on("click", function() {
        var src = $(this).attr("src");
        $(".modal-img").prop("src", src);
    })
})
$(function() {
    // when the modal is closed
    $('#modal-container').on('hidden.bs.modal', function() {
        // remove the bs.modal data attribute from it
        $(this).removeData('bs.modal');
        // and empty the modal-content element
        $('#modal-container .modal-content').empty();
    });
});
$('#prepare-quote').on('shown.bs.modal', function() {
    $(this).removeData('bs.modal');
});
</script>
@endsection