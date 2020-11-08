@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_add_date')

<script type="text/javascript">
// Show function
$(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#af').text($(this).data('personalleave'));
    $('.exampleModal').text('Show Post');
});
console.log($('#pel').text($(this).data('personalleave')));
console.log($(this).data('personalleave'));
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
                                <td>{{$ticket->firstnamebem}} &nbsp; &nbsp; &nbsp; &nbsp; {{$ticket->lastnamebem}}
                                    ---{{$ticket->personalleave}}</td>
                                <td><button type="button" class="show-modal btn btn-info btn-fill pull-right"
                                        data-id="{{$ticket->id}}"
                                        data-affair="{{$ticket->personalleave}}"
                                         data-toggle="modal" data-target="#exampleModal">
                                        view
                                    </button></td>
                                </td>
                                <td><a class="btn btn-info btn-fill" href="/show_date/{{$ticket->iduser}}"
                                        role="button">เเก้ไข</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID :</label>
                    <b id="i" />
                </div>
                <div class="form-group">
                    <label for="">เรื่อง :</label>
                    <b id="af" />
                </div>
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