<?php
/**
 * code.String,
 */


//substring
$s1 = substr('AA5855725PA',0,-2);
echo $s1;

$z = '12321*' ;
echo strrpos($z, "*") . PHP_EOL;
if( strrpos($z, "*") != false){
	$z = '/^' . str_replace('*', '', $z) . '.*/';
}
echo $z . PHP_EOL;
?>
