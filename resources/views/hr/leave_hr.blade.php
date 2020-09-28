@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_leave_hr')
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
$(document).on('click', '.show-modal-1', function() {
    $('#show').modal('show');
    $('#id').text($(this).data('id'));
    $('#lf').text($(this).data('lea_fname'));
    $('#l_ln').text($(this).data('lea_lname'));

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

#myImg:hover {
    opacity: 0.7;
}

/* The Modal (background) */
/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.3);
    /* Black w/ opacity */
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
.modal-content,
#caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes zoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
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
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}
</style>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> การขออนุมัติลา </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                        <div class="card-header">
                            <h4 class="card-title">การขออนุมัติลา</h4>

                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table">
                                <thead>
                                    <th>id</th>
                                    <th>เรื่อง</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>ชื่อเล่น</th>
                                    <th>ประเภทการลา</th>
                                    <th>Image</th>
                                    <th>ผลการอนุมัติ</th>
                                    <th>เครื่องมือ</th>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach($leave as $ticket1)
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td>{{$ticket1->affair}}</td>
                                        <td>{{$ticket1->lea_fname}}</td>
                                        <td>{{$ticket1->lea_lname}}</td>
                                        <td>{{$ticket1->lea_niname}}</td>
                                        <td>{{$ticket1->leave}}</td>
                                        <td>
                                            <div id="image">
                                                <a href="#modal" data-toggle="modal" data-target="#modalimage">
                                                    <img id="myImg" src="img/file/{{$ticket1->image}}" width="30px"
                                                        height="30px" />
                                                </a>
                                            </div>
                                        </td>
                                        <td><label style="color:#0000FF">กำลังรอการอนุมัติ</label></td>
                                        <td><a class="show-modal btn btn-info btn-fill pull-right " href="#"
                                                data-id="{{$ticket1->id}}" data-affair="{{$ticket1->affair}}"
                                                data-head="{{$ticket1->fname}}&nbsp;&nbsp;&nbsp;{{$ticket1->lname}}&nbsp;&nbsp;&nbsp;({{$ticket1->niname}})"
                                                data-lea_fname="{{$ticket1->lea_fname}}"
                                                data-lea_lname="{{$ticket1->lea_lname}}&nbsp;&nbsp;&nbsp;({{$ticket1->lea_niname}})"
                                                data-position="{{$ticket1->position}}" data-leave="{{$ticket1->leave}}"
                                                data-since="{{$ticket1->since}}" data-date1="{{$ticket1->date1}}"
                                                data-date2="{{$ticket1->date2}}" data-da="{{$ticket1->da}}"
                                                data-address="{{$ticket1->address}}" data-tel="{{$ticket1->tel}}"
                                                data-status_chief="{{$ticket1->status_chief}}"
                                                data-status_text1="{{$ticket1->status_text1}}" data-toggle="modal"
                                                data-target="#exampleModal">View</a>
                                            
                                        </td>
                                        <td>
                                            <a href="{{action('NewcompaniesController@show',$ticket1->id)}}"
                                                type="button" name="status_hr" value="อนุมัติ"
                                                class="edit-modal btn btn-success btn-fill " role="button"
                                                aria-pressed="true" id="btnPrint">การอนุมัติ</a>
                                                
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <?php echo $leave->links();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
<!-- Modal show-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลการขออนุมัติลา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" data-toggle="modal" data-target="#exampleModal">&times;</span>
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
                <div class="form-group">
                    <label for="">ชื่อหัวหน้า :</label>
                    <b id="he" />
                </div>
                <div class="form-group">
                    <label for="">ชื่อ นามสกุล :</label>
                    <a-l><b id="fi" /></a-l>
                    <a-l>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="la" /></a-l>
                </div>

                <div class="form-group">
                    <label for="">ตำเเหน่ง :</label>
                    <b id="pt" />
                </div>
                <div class="form-group">
                    <label for="">ประเภทการ :</label>
                    <b id="le" />
                </div>
                <div class="form-group">
                    <label for="">เนื่่องจาก :</label>
                    <b id="si" />
                </div>
                <div class="form-group">
                    <label for="">ตั้งเเต่- จนถึง :</label>
                    <a-l><b id="dt1" /></a-l>
                    <a-l>&nbsp;&nbsp;ถึง&nbsp;&nbsp;<b id="dt2" /></a-l>
                </div>
                <div class="form-group">
                    <label for="">ลาทั้งหมด :</label>
                    <b id="d" />
                    <label for=""> วัน </label>
                </div>
                <div class="form-group">
                    <label for="">ที่อยุ่ขณะที่ลา :</label>
                    <b id="ad" />
                </div>
                <div class="form-group">
                    <label for="">เบอร์ติดต่อ :</label>
                    <b id="t" />
                </div>
                <div class="form-group">
                    <label for="">ผลการอนุมัติ :</label>
                    <b id="sc" />
                </div>
                <div class="form-group">
                    <label for="">หมายเหตุ หัวหน้า:</label>
                    <b id="st1" />
                </div>
            </div>
        </div>
    </div>
</div>

<!---END-- Modal -->

<!--Modal  ไม่อนุมัติ-->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" data-toggle="modal" data-target="#example">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">ID:</label>
                        <input type="text" class="form-control" name="lea_fname" id="lf">
                        <input type="text" class="form-control" data-id="emp_id">
                        <input type="text" class="form-control" data-id="emp_id">
                    </div>
                </form>
                <form method="POST" action="{{'up_no'}}">
                    @csrf
                    <input type="text" name="lf" id="lf" />
                    <div class="form-group">
                        <label for="">ID :</label>
                        <b id="id" />
                    </div>
                    <div class="form-group">
                        <label for="">ชื่อ นามสกุล :</label>
                        <a-l><b id="lf" /></a-l>
                        <a-l>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="l_ln" /></a-l>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!--END Modal  ไม่อนุมัติ-->

<!---- Modal  Img -->
<div>
    <div class="modal fade " id="modalimage" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <img class="modal-img" />
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->

<!--   Core JS Files   -->
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