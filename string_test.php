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
echo md5("0988384360") . PHP_EOL;

//正規表示
if (preg_match("/1/i", "12345")) {
//    echo "12345 條件符合". PHP_EOL;
} else {
//    echo "12345 條件不符合". PHP_EOL;
}

//判斷只有8個數字
if (preg_match("/^\d{8}$/i", "12345678")) {
//    echo "12345 條件符合". PHP_EOL;
} else {
//    echo "12345 條件不符合". PHP_EOL;
}

if (preg_match("/^[A-Za-z]{1}\d{9}$/i", "A123456789")) {
//    echo "K123456789 條件符合". PHP_EOL;
} else {
//    echo "K123456789 條件不符合". PHP_EOL;
}

if (preg_match("/gmail/i", "johnny@yahoo.com")) {
//    echo "johnny@gmail.com 條件符合". PHP_EOL;
} else {
//    echo "johnny@gmail.com 條件不符合". PHP_EOL;
}

//null isset 或 empty
echo "null isset 或 empty" .PHP_EOL;
$n = null;
if (isset($n)){
    echo "isset";
}else{ 
    echo "not set";
}
echo PHP_EOL;
if (empty($n)) 
    echo "empty"; 
else 
    echo "not empty";
echo PHP_EOL;
?>
