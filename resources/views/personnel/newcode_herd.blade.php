@extends('layouts.app')
@include('layouts.manu.personnel.manu_leave2')
@section('content')
<style>
.center {
    position: absolute;
    top: 30%;

}

.button {
    position: absolute;
    left: 505px;

}
</style>
<div class="main-panel">
    <div class="container">
        <div class="row">
            <div class="col-sm">
             
            </div>
            <div class="col-sm  center">
                @php
                $idcode = empty($code_id[0]->id) ? '' : $code_id[0]->id;
                @endphp
                <form align='center' method="POST" action="code_herd/{{$idcode}}">
                    @csrf
                    <div class="form-group">
                        @if(session('success'))
                        <div class="alert alert-warning" role="alert">
                            {!! \Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </div>
                        @endif
                        <label for="exampleInputEmail1">รหัสแผนก</label>
                        <input type="text" class="form-control" name="code_herd" required>
                        <small id="emailHelp" class="form-text text-muted">ขอรหัสได้จากหัวหน้าแผนก</small>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>
                    </div>
                </form>

            </div>
            <div class="col-sm">
            
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</div>
@endsection