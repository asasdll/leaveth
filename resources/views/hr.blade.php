@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_profile')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> ข้อมูลบริษัท </a>
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
                        <div class="col-md-8">
                            <div class="card">
				<h5 class="alert alert-warning">กรุณาเพิ่ม หัวหน้าแผนกเพื่อใช้งานระบการลา "เพิ่มจากเมนู  ('ตำเเหน่ง')"</h4>
                                <div class="card-header">
                                    <h4 class="card-title">ข้อมูลบริษัท</h4>
                                </div>
                                <div class="card-body">
                                @foreach($hrbumble as $ticket)
                                    <form >
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Company (Code)</label>
                                                    <input type="text" class="form-control"  placeholder="Company" value="{{$ticket->newcode}}">
                                                </div>
                                            </div>
                                            <div class="col-md-7 px-1">
                                                <div class="form-group">
                                                    <label>ชื่อบริษัท</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Username" value="{{$ticket->companyname}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>ชื่อ</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Company" value="{{$ticket->firstnamebem}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>นามสกุล</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Last Name" value="{{$ticket->lastnamebem}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>เบอร์ติดต่อ</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Tel"  name="tel"   value="{{$ticket->tel}}"  required autocomplete="tel" autofocus>
                                                    @error('tel')
                                                        <span class="invalid-feedback" role="alert">
                                                          <font color="red">{{"กรุณากรอก ตัวเลข เท่านั้น"}}</font>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>เบอร์บริษัท</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="tel2" name="tel2"  value="{{$ticket->tel2}}" autocomplete="tel2" autofocus>
                                                    @error('tel2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <font color="red">{{"กรุณากรอก ตัวเลข เท่านั้น"}}</font>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md- pr-1">
                                          <div class="form-group">
                                            <label for="inputPassword4">ที่อยู่</label>
                                            <input id="name" type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{$ticket->address}}" required autocomplete="address" autofocus>
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
                                                      <input type="text" class="form-control  @error('city') is-invalid @enderror" placeholder="City"  name="city" value="{{$ticket->city}}" required autocomplete="city" autofocus>
                                                      @error('city')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message}}</strong>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                              <div class="col-md-6 pl-1">
                                                  <div class="form-group">
                                                      <label>รหัสไปรษณีย์</label>
                                                      <input type="text" class="form-control  @error('address') is-invalid @enderror" placeholder="ZIP Code" name="postalcode" value="{{$ticket->postalcode}}" required autocomplete="postalcode" autofocus>
                                                      @error('postalcode')
                                                          <span class="invalid-feedback" role="alert">
                                                                <font color="red">{{'ตรวจสอบ รหัสไปรษณีย์ อีกครั้ง'}}</frot>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                          </div>
                                          <a href="{{action('NewcompaniesController@edit',$ticket->id)}}" class="btn btn-info btn-fill pull-right" role="button" aria-pressed="true">เเก้ไขข้อมูล</a>
                                        <div class="clearfix"></div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                <img src="img/imgback/large_8.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                           @foreach($hrbumble as $ticket)                                   

                                            <img class="avatar border-gray" src="img/profile/{{$ticket->image}}" alt="...">

                                            <h5 class="title">{{$ticket->companyname}}</h5>
                                        </a>
                                        <p class="description">
                                                 <font color="primary"> {{$ticket->newcode}}</font>
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                      {{$ticket->firstname}}   {{$ticket->lastname}}
                                        <br>Tel- {{$ticket->tel}}
                                        <br>Tel- {{$ticket->tel2}}
                                        <br> {{$ticket->address}}
                                        <br> {{$ticket->city}}  {{$ticket->postalcode}}
                                    </p>
                                    @endforeach
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
