<div class="wrapper">
    <div class="sidebar" data-image="{{ URL::to('/') }}/assets2/img/sidebar-2.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    Leaveth.com
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a class="nav-link" href="{{url('home')}}">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>ข้อมูลผู้ใช้</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('table')}}">
                        <i class="nc-icon nc-notes"></i>
                        <p>ประวัติการลงเวลา</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('pos')}}">
                        <i class="nc-icon nc-grid-45"></i>
                        <p>ตำเเหน่ง</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('usersprofile')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>พนักงาน</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('date_leave')}}">
                        <i class="nc-icon nc-align-left-2"></i>
                        <p>กำหนดการลา</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('leave_hr')}}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>การขออนุมัติลา</p>
                    </a>
                </li>
                <li  class="nav-item active">
                    <a class="nav-link" href="{{url('record')}}">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>ประวัติการลา</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('mac')}}">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>จุดลงเวลา</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" target ="_blank"  href="{{url('qr-code-g')}}">
                    <i class="fa fa-qrcode" style="font-size:30px"></i>
                        <p>QRCODE</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>