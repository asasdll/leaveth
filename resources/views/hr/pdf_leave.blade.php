<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        font-size:30px;
        }
    </style>
</head>

<body>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                <p>ประวัติการลา</p>
                </div>
            </nav>
            <br>
            <br>
            <br>
    <div class="content">
        <div class="container-fluid">
           <div class="row">
            <div class="col-sm-">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>เรื่อง</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำเเหน่ง</th>
                        <th>ประเภทการลา</th>
                        <th>เนื่องจาก</th>
                        <th>ตั้งเเต่</th>
                        <th>จนถึง</th>
                        <th>รวมวันลา</th>
                    </tr>
                </thead>
                @php
                    $i = 0;
                @endphp
                @foreach($user_aaa as $ticket)
                <tbody>
                    <tr>
                    <td>@php echo ++$i @endphp</td>
                    <td>{{$ticket->affair}}</td>
                    <td>{{$ticket->lea_fname}}</td>
                    <td>{{$ticket->lea_lname}}</td>
                    <td>{{$ticket->position}}</td>
                    <td>{{$ticket->leave}}</td>
                    <td>{{$ticket->since}}</td>
                    <td>{{$ticket->date1}}</td>
                    <td>{{$ticket->date2}}</td>
                    <td>{{$ticket->da}}</td>
                    </tr>
                </tbody>
                @endforeach
                </table>
                </div>
                </div>
                </div>
                </div>
        </div>
    </div>
    <!--   -->
</body>
<!--   Core JS Files   -->
</html>
