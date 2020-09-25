@extends('layouts.app')
@section('content')
@include('layouts.manu.hr.manu_newmacaddress')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">MAC Address</a>
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
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Edit Mac Address</h4>
                                    <p class="card-category">Mac Address</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-sm-2 col-sm-">
                                      </div>
                                      <div class="col-sm-8 col-sm-12">
                                        <form   method="POST" action="{{action('AddmacController@update',$id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8 pr-1">
                                                    <div class="form-group">
                                                        <label>Mac Address</label>
                                                        <input type="text"  id="addmac" onkeyup="autoTab(this)" class="form-control @error('address') is-invalid @enderror" name="addmac" value="{{$ticket->addmac}}" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label>ชื่อ</label>
                                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="name" value="{{$ticket->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                              <button type="submit" class="btn btn-info btn-fill pull-right">บันทึกข้อมูล</button>
                                              <input type="hidden" name="_method" value="PATCH" />
                                            </form>
                                      </div>
                                      <div class="col-sm-2 col-sm-">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    
    <!--   -->

 <script type="text/javascript">
     function autoTab(obj){
         /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
         หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
         4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
         รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
         หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
         ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
         */
             var pattern=new String("__.__.__.__.__.__"); // กำหนดรูปแบบในนี้
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
