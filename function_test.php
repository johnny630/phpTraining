<?php
function test1($a=0 , $b=0){
	echo $a , $b , PHP_EOL;
}

test1(4,5);
test1( $b=6);//這會不如預期 echo 60
test1( $b=6 , $a=1);
?>
