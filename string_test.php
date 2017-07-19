<?php
/**
 * code.String,
 * 
 * 使用方式：
 * ''
 * ""
 * heredoc
 * nowdoc
 * 
 * 
 * '' 裡面特殊跳脫字元、變數不會被轉義
 */
//strripos
echo "strripos" .PHP_EOL;
if (strripos("abc","d")==FALSE){
echo strripos("abc","d") . PHP_EOL;
}
//
$params = "/1-a/2-b/3-c/";
$str_array = explode('/', $params);
foreach($str_array as $key=>$value){
	echo "$key . $value". PHP_EOL;
}

//substring
$s1 = substr('AA5855725PA',0,-2);
echo $s1;

$z = '12321*' ;
echo strrpos($z, "*") . PHP_EOL;
if( strrpos($z, "*") != false){
	$z = '/^' . str_replace('*', '', $z) . '.*/';
}
echo $z . PHP_EOL;

//md5
echo md5("231950") . PHP_EOL;
echo md5("damnallen") . PHP_EOL;
echo md5("kkandstw1226@yahoo.com.tw") . PHP_EOL;
echo md5("s361871") . PHP_EOL;
echo md5("Bin8999") . PHP_EOL;
?>
