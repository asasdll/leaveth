<div class="wrapper">
        <div class="sidebar" data-image="{{ URL::to('/') }}/public/assets2/img/sidebar-4.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
                <div class="logo">
                    <a  class="simple-text">
                    Leaveth.com
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="{{url('VH')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>ข้อมูลผู้ใช้</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('tablepe')}}">
                            <i class="nc-icon nc-notes"></i>
                            <p>ประวัติการลงเวลา</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('leave3')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>ผลการอนุมัติลา</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('leave2')}}">
                            <i class="nc-icon nc-align-left-2"></i>
                            <p>การขออนุมัติลา</p>
                        </a>
                    </li>
                    <li  class="nav-item active">
                        <a class="nav-link" href="{{url('sum_date')}}">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>ประวัติการลา</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('timestampch')}}">
                            <i class="nc-icon nc-tap-01"></i>
                            <p>บันทึกเวลา</p>
                        </a>
                    </li>
                  </ul>
            </div>
        </div>