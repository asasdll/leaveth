<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <div class="main-panel">
        @include('layouts.function')
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <p>ประวัติการบันทึกเวลา</p>
            </div>
            <div>
                @php
                $p_acc = empty($user_aaa[0]->created_at) ? '' : $user_aaa[0]->created_at;
                $rest = substr("$p_acc", 0, 7);
                @endphp
                <br />
                <p>{{$rest }}</p>
            </div>
        </nav>
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