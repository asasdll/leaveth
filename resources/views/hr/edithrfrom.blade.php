@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_profile')
<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> ข้อมูลบริษัท </a>
                    
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">เเก้ไข ข้อมูลบริษัท</h4>
                                </div>
                                <div class="card-body">
                                  <form   method="POST" action="{{action('NewcompaniesController@update', $id)}}"  enctype="multipart/form-data">
                                      @csrf
                                        <div class="form">
                                          <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Company (Code)</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$ticket->newcode}}">
                                                </div>
                                            </div>
                                          <div class="col-md-7 pr-1">
                                          <div class="form-group">
                                            <label for="inputEmail4">ชื่อบริษัท</label>
                                            <input id="name" type="text" class="form-control is-invalid @error('companyname') is-invalid @enderror" name="companyname" value="{{$ticket->companyname}}" placeholder="CompanyName" required autocomplete="companyname" autofocus>
                                            @error('companyname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message}}</strong>
                                                </span>
                                            @enderror
                                          </div>
                                        </div>
                                        </div>
                                          <div class="row">
                                              <div class="col-md-6 pr-1">
                                                  <div class="form-group">
                                                      <label>ชื่อ</label>
                                                      <input type="text" class="form-control is-invalid @error('firstname') is-invalid @enderror" placeholder="firstname"  name="firstname" value="{{$ticket->firstname}}"  required autocomplete="firstname" autofocus>
                                                      @error('firstname')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message}}</strong>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                              <div class="col-md-6 pl-1">
                                                  <div class="form-group">
                                                      <label>นามสกุล</label>
                                                      <input type="text" class="form-control is-invalid @error('lastname') is-invalid @enderror" placeholder="LastName" name="lastname" value="{{$ticket->lastname}}" required autocomplete="lastname" autofocus>
                                                      @error('lastname')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message}}</strong>
                                                          </span>
                                                      @enderror
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6 pr-1">
                                                  <div class="form-group">
                                                      <label>เบอร์ติดต่อ</label>
                                                      <input type="text"  onkeyup="autoTab(this)" class="form-control is-invalid @error('tel') is-invalid @enderror" placeholder="Tel"  name="tel"  value="{{$ticket->tel}}"   required autocomplete="firstname" autofocus>
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
                                                      <input type="text"  onkeyup="autoTab2(this)" class="form-control is- @error('tel') is-invalid @enderror " placeholder="tel2" value="{{$ticket->tel2}}" name="tel2"  autocomplete="tel2" autofocus>
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
                                            <input id="name" type="text" class="form-control is-invalid @error('address') is-invalid @enderror" name="address" placeholder="Address"  value="{{$ticket->address}}" required autocomplete="address" autofocus>
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
                                                      <input type="text" class="form-control is-invalid @error('city') is-invalid @enderror" placeholder="City"  name="city" value="{{$ticket->city}}" required autocomplete="city" autofocus>
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
                                                      <input type="text" class="form-control is-invalid @error('postalcode') is-invalid @enderror" placeholder="ZIP Code" name="postalcode" value="{{$ticket->postalcode}}" required autocomplete="postalcode" autofocus>
                                                      @error('postalcode')
                                                          <span class="invalid-feedback" role="alert">
                                                                <font color="red">{{'ตรวจสอบ รหัสไปรษณีย์ อีกครั้ง'}}</frot>
                                                          </span>
                                                      @enderror
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
                                      <img src="{{ URL::to('/') }}/img/imgback/large_8.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">

                                           <img class="avatar border-gray" src="{{ URL::to('/') }}/img/profile/{{$ticket->image}}" alt="...">

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
    </div>
     <script type="text/javascript">
    function autoTab(obj){
        /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
        หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
        4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
        รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
        หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
        ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
        */
            var pattern=new String("___-____-____"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText=new String("");
            var obj_l=obj.value.length;
            var obj_l2=obj_l-1;
            for(i=0;i<pattern.length;i++){
                if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                    returnText+=obj.value+pattern_ex;
                    obj.value=returnText;
                }
            }
            if(obj_l>=pattern.length){
                obj.value=obj.value.substr(0,pattern.length);
            }
    }
    </script>
    <script type="text/javascript">
    function autoTab2(obj){
       /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
       หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
       4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
       รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
       หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
       ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
       */
           var pattern=new String("_-____-____"); // กำหนดรูปแบบในนี้
           var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
           var returnText=new String("");
           var obj_l=obj.value.length;
           var obj_l2=obj_l-1;
           for(i=0;i<pattern.length;i++){
               if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                   returnText+=obj.value+pattern_ex;
                   obj.value=returnText;
               }
           }
           if(obj_l>=pattern.length){
               obj.value=obj.value.substr(0,pattern.length);
           }
    }
    </script>

@endsection