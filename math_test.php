<?php
echo 105/10 .PHP_EOL;
echo floor(105/10) .PHP_EOL;
echo 0/10 .PHP_EOL;
echo 102%10 .PHP_EOL;

echo ( floor(10510/100)*12) + (10510%100) . PHP_EOL;

function countIntervalMonth($monthCount1 , $monthCount2){
    $monthCount = $monthCount2 - $monthCount1;
    if (floor($monthCount1/100) !=  floor($monthCount2/100)){
        if ($monthCount2>$monthCount1){
            return (floor($monthCount/100)*12) + (12-($monthCount1%100)) + ($monthCount2%100);
        }else{
            return (floor($monthCount/100)*12) + (12-($monthCount2%100)) + ($monthCount1%100);
        }
    }else{
        if ($monthCount2>$monthCount1){
            return $monthCount2%100 ;
        }else{
            return $monthCount1%100 ;
        }
    }
}
echo countIntervalMonth(10512 , 10603) .PHP_EOL;
?>
