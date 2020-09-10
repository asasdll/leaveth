<html>

<head>
    <title>leaveth</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/assets/img/icon_i2.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }

    body {
        font-family: "THSarabunNew";
    }

    p {
        font-size: 30px;
    }

    bood {
        font-size: 25px;
        position: absolute;
        right  : -55px;
        top: -25px;
        z-index: -1;

    }
    </style>
</head>

<body>
    @php
    $p_acc = empty($user_aaa[0]->created_at) ? '' : $user_aaa[0]->created_at;
    $image = empty($image_user[0]->image) ? '' : $image_user[0]->image;
    $rest = substr("$p_acc", 0, 7);
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-md" align='center'>
            <img class="avatar border-gray" src="img/profile/{{$image}}" width="60"  height="60" alt="...">
                <p>ประวัติการบันทึกเวลา</p>
            </div>
            <div class="col-md">
                <bood>{{$rest }}</bood>
            </div>
        </div>
    </div>
    <div class="main-panel">
        @include('layouts.function')
        <!-- Navbar -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>วันที่</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เข้างาน</th>
                    <th>ออกงาน</th>
                    <th>รวมเวลา</th>
                </tr>
            </thead>
            @php
            $i = 0;
            @endphp
            @foreach($user_aaa as $ticket)
            <tbody>
                <tr>
                    <td>@php echo ++$i @endphp</td>
                    <td>{{$ticket->time_date}}</td>
                    <td>{{$ticket->firstnamebem}}</td>
                    <td>{{$ticket->lastnamebem}}</td>
                    <td>{{$ticket->time_in}}</td>
                    <td>{{$ticket->time_out}}</td>

                    <td>
                        @if($ticket->time_out != "")

                        @php
                        $time_a="$ticket->time_in";
                        $time_b="$ticket->time_out";
                        @endphp
                        {{diff2time($time_a,$time_b)}}

                        @elseif($ticket->time_out == "")

                        <font color="red">{{'ยังลงเวลาไม่ครบ'}}</font>
                        @endif

                    </td>


                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    </div>
</body>

</html>