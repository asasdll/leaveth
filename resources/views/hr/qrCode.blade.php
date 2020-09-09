<!DOCTYPE html>
<html>
<head>
<title>leave</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/assets/img/icon_i2.png" />
</head>
<body>
    
<div class="visible-print text-center"  align = 'center'> 
	<h1>leaveth</h1>
     
    {!! QrCode::size(400)->generate('leaveth.com'); !!}
     
    
</div>
<body onLoad="window.print()">
    
</body>
</html>