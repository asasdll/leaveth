@extends('layouts.app')
@section('content')
@include('layouts.manu.chief.manu_profile')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="newcompany">ข้อมูลผู้ใช้งาน </a>
                    @include('layouts.navbar')
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">เเก้ไข ข้อมูลผู้ใช้งาน</h4>
                                </div>
                                <div class="card-body">
                                  <form method="POST" action="{{action('MemberuserController@update', $id)}}"  enctype="multipart/form-data">
                                      @csrf
                                        <div class="form">
                                          <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Company (Code)(กรุณาติดต่อ HR)</label>
                                                    <input type="text" class="form-control " disabled=""  name="code"  value="{{$chief->code}}"   required autocomplete="code" autofocus>
                                                </div>
                                            </div>
                                              <div class="col-md-4 pr-1">
                                                  <div class="form-group">
                                                      <label>ชื่อ</label>
                                                      <input type="text" class="form-control is-invalid @error('firstnamebem') is-invalid @enderror"   name="firstnamebem" value="{{$chief->firstnamebem}}"  required autocomplete="firstname" autofocus>
                                                      @error('firstname')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message}}</strong>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                              <div class="col-md-4 pl-1">
                                                  <div class="form-group">
                                                      <label>นามสกุล</label>
                                                      <input type="text" class="form-control is-invalid @error('lastnamebem') is-invalid @enderror" name="lastnamebem" value="{{$chief->lastnamebem}}" required autocomplete="lastname" autofocus>
                                                      @error('lastnamebem')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message}}</strong>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>ชื่อเล่น</label>
                                                    <input type="text" class="form-control" name="nickname" value="{{$chief->nickname}}" >
                                                </div>
                                            </div>
                                              <div class="col-md-6 pr-1">
                                                  <div class="form-group">
                                                      <label>อายุ</label>
                                                      <input type="text" class="form-control"   name="age" value="{{$chief->age}}" >
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>วว/ดด/ปป</label>
                                                    <input class="form-control" type="date" value="{{$chief->date}}" id="example-date-input" name="date" >
                                                </div>
                                            </div>
                                              <div class="col-md-6 pr-1">
                                                  <div class="form-group">
                                                      <label>เบอร์ติดต่อ</label>
                                                      <input type="text" class="form-control is-invalid @error('tel') is-invalid @enderror"   name="tel" value="{{$chief->tel}}"   required autocomplete="tel" autofocus>
                                                      @error('tel')
                                                          <span class="invalid-feedback" role="alert">
                                                            <font color="red">{{"กรุณากรอก ตัวเลข เท่านั้น"}}</font>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-8 pr-1">
                                                  <div class="form-group">
                                                      <label>เบอร์ติดต่อฉุกเฉิน</label>
                                                      <input type="text" class="form-control is-invalid @error('tel2') is-invalid @enderror"   name="tel2"   value="{{$chief->tel2}}" required autocomplete="tel2" autofocus>
                                                      @error('tel2')
                                                          <span class="invalid-feedback" role="alert">
                                                            <font color="red">{{"กรุณากรอก ตัวเลข เท่านั้น"}}</font>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                              <div class="col-md-4 pl-1">
                                                  <div class="form-group">
                                                      <label>ชื่อเบอร์ติดต่อฉุกเฉิน</label>
                                                      <input type="text" class="form-control is-invalid @error('telname2') is-invalid @enderror "  name="telname2" value="{{$chief->telname2}}"  autocomplete="telname2" autofocus>
                                                      @error('telname2')
                                                          <span class="invalid-feedback" role="alert">
                                                              <font color="red">{{"กรุณากรอก ตัวเลข เท่านั้น"}}</font>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-8 pr-1">
                                                  <div class="form-group">
                                                      <label>เบอร์ติดต่อฉุกเฉิน 2</label>
                                                      <input type="text" class="form-control "  name="tel3"  value="{{$chief->tel3}}" autocomplete="telname3" autofocus>
                                                  </div>
                                              </div>
                                              <div class="col-md-4 pl-1">
                                                  <div class="form-group">
                                                      <label>ชื่อเบอร์ติดต่อฉุกเฉิน 2</label>
                                                      <input type="text" class="form-control "  name="telname3" value="{{$chief->telname3}}" autocomplete="telname3" autofocus>
                                                  </div>
                                              </div>
                                          </div>
                                        <div class="col-md- pr-1">
                                          <div class="form-group">
                                            <label for="inputPassword4">ที่อยู่ตามทะเบียนบ้าน</label>
                                            <input id="name" type="text" class="form-control is-invalid @error('address') is-invalid @enderror" name="address" value="{{$chief->address}}"  required autocomplete="address" autofocus>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message}}</strong>
                                                </span>
                                            @enderror
                                          </div>
                                        </div>
                                          <div class="row">
                                              <div class="col-md-6 pr-1">
                                                  <div class="form-group">
                                                      <label>จังหวัด</label>
                                                      <input type="text" class="form-control "  name="city"  value="{{$chief->city}}" autocomplete="city" autofocus>
                                                  </div>
                                              </div>
                                              <div class="col-md-3 pl-1">
                                                  <div class="form-group">
                                                      <label>รหัสไปรษณีย์</label>
                                                      <input type="text" class="form-control"  name="postalcode" value="{{$chief->postalcode}}" autocomplete="postalcode" autofocus>
                                                  </div>
                                              </div>
                                              <div class="col-md-3 pl-1">
                                                  <div class="form-group">
                                                      <label for="inputState">สถานะ</label>
                                                      <select id="inputState" class="form-control" name="status2">
                                                        <option selected>เลือก</option>
                                                        <option value="โสด">โสด</option>
                                                        <option value="เเต่งาน">เเต่งาน</option>
                                                        <option value="หย่าร้าง">หย่าร้าง</option>
                                                        <option value="เเยกกันอยู่">เเยกกันอยู่</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlFile1">Uplode image</label>
                                            <input type="file" class="form-control" id="image"  name="image">
                                          </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">บันทึกข้อมูล</button>
                                        <div class="clearfix"></div>
                                    <input type="hidden" name="_method" value="PATCH" />
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4  pl-1">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="{{ URL::to('/') }}/img/imgback/large_4.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                      <a href="#">

                                         <img class="avatar border-gray" src="{{ URL::to('/') }}/img/profile/{{$chief->image}}" alt="...">

                                         <h5 class="title">{{$chief->firstname}}  {{$chief->lastname}}</h5>
                                     </a>
                                     <p class="description">
                                              <font color="primary">Tel- {{$chief->tel}}</font>
                                     </p>
                                 </div>
                                 <p class="description text-center">
                                   {{$chief->firstname}}   {{$chief->lastname}}
                                     <br>Tel- {{$chief->tel2}} {{$chief->telname2}}
                                     <br> {{$chief->address}}
                                     <br> {{$chief->city}}  {{$chief->postalcode}}
                                 </p>
                                </div>
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
            </div>
            @include('layouts.footer')
        </div>
        @endsection