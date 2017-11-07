<?php
for($i=0;$i<20;$i++) {
    $r = rand();
    echo $r , PHP_EOL;
    $r2 = uniqid($r) ;
    echo $r2 , PHP_EOL;
    $r3 = md5($r2);
    echo $r3 , PHP_EOL;
}
?>
