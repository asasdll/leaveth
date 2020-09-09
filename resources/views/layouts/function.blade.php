@php
// รูปแบบของเวลาที่ใช้คำนวณ แบบ
// อยู่ในรูปแบบ 00:00:00 ถึง 23:59:59

function diff2time($time_a,$time_b){
$now_time1=strtotime($time_a);
$now_time2=strtotime($time_b);
$time_diff=abs($now_time2-$now_time1);
$time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
$time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน
$time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
return $time_diff_h." ชั่วโมง ".$time_diff_m." นาที ".$time_diff_s." วินาที";
}

// การใช้งาน

// ผลลัพธิ์
// 1 ชั่วโมง 4 นาที 55 วินาที
@endphp