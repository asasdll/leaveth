@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_newmacaddress')
<script>
function confirmDelete(delUrl) {
    if (confirm("คุณแน่ใจหรือว่าต้องการลบ")) {
        document.location = delUrl;
    }
}
</script>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">MAC Address</a>
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
                            <h4 class="card-title">Mac Address</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ session::get('success') }}
                            </div>
                            @endif
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Mac Address</th>
                                    <th>name</th>
                                </thead>
                                <tbody>
                                @php
                                $i = 0;
                                @endphp
                                    @foreach($addmac as $ticket)
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td>{{$ticket->addmac}}</td>
                                        <td>{{$ticket->name}}</td>
                                        <td><a class="btn btn-info pull-right" href="{{action('AddmacController@edit',$ticket->id)}}" role="button">เเก้ไข</a>
                                        </td>
                                         <td>
                                            <form method="post" class="delete_form pull-right"
                                                action="{{action('AddmacController@destroy',$ticket->id)}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <br>
                                                <button type="submit"
                                                onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบ')"
                                                class="btn btn-danger">ลบ</button>
                                                </form>
                                           </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <a href="newmac" class="btn btn-info btn-fill pull-right" role="button" aria-pressed="true">เพิ่ม 
                            จุดลงเวลา</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection