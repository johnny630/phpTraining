<?php
//取得日期
echo gettype(date('Y-m-d')) . PHP_EOL;
echo date('Y-m-d') . PHP_EOL;//取得今日日期

//日期加減
echo "日期加減". PHP_EOL;
$date1 = new DateTime("now");
$date1->modify('-1 month');
echo $date1->format('Y-m-d') . PHP_EOL;


//date time 
echo "\nDatetime diff\n";
$datetime1 = strtotime('2009-10-11');
$datetime2 = new DateTime("now");
//$interval = $datetime1->diff($datetime2);

//echo "datetime1 datetime2時間差:". $interval->days ."天\n";

echo "--week 日期計--\n";
$date = new DateTime("2017-12-27");
$date->modify('monday this week');
echo $date->format("Y-m-d") ."\n";
$date->modify('monday last week');
echo $date->format("Y-m-d") ."\n";
// $date->modify('first day of +0 month');
// echo $date->format("Y-m-d") ."\n";
// $date->modify('last day of +0 month');
// echo $date->format("Y-m-d") ."\n";
//echo strtotime("this monday");

echo "\n";

//字串年月差異
$d1 = DateTime::createFromFormat('Ym', strval( (floor(10603/100)+1911)*100 + 10603%100)  );
$d2 = DateTime::createFromFormat('Ym','201612');
print_r($d1) ;
$diff = date_diff($d1 , $d2);
print_r($diff->m);

//show date 格式
echo PHP_EOL.'date G:'. date('G') . PHP_EOL;

function countIntervalMonth($monthCount1 , $monthCount2){
    $d1 = DateTime::createFromFormat('Ymd', strval( (floor($monthCount1/100)+1911)*100 + $monthCount1%100).'01' );
    $d2 = DateTime::createFromFormat('Ymd', strval( (floor($monthCount2/100)+1911)*100 + $monthCount2%100).'01' );

    print_r($d1) ;
    print_r($d2) ;
    print_r(date_diff($d1 , $d2));
    return date_diff($d1 , $d2)->m;
}
echo (countIntervalMonth(10502 , 10603));

//日期加減
$today = date('Y-m-d');
//$updateTime = strtotime('2017-10-13');

$start = strtotime($today);
$end = strtotime('2017-10-13');
$timeDiff = $end - $start;
$diff_day = floor($timeDiff / (60 * 60 * 24));
//$diff_day = Date::dateDiff($updateTime,$today);
echo "日期加減:$diff_day".PHP_EOL;

//日期字串比對
$d1 = "2017-12-24 20:49:59";
$d2 = "2017-10-25 14:52:31.800";
if($d1 < $d2){
 echo "該更新";
}else{
 echo "不用更新";
}
?>
