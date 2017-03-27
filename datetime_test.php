<?php
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

?>