<?php
/**
* nginx userid 加解密邏輯
*/
//strtoupper(implode('', array_map('strrev', str_split(current(unpack('h*', base64_decode(str_replace(' ', '+', $id)))), 8))))

$id = 'wKgIZFmnXXM+skepA2MHAg==';

$base64decode = base64_decode(str_replace(' ', '+', $id));
echo "base64decode (". gettype($base64decode)."): $base64decode" . PHP_EOL;


$unpackvar = unpack('h*', $base64decode );
echo "unpackvar (". gettype($unpackvar) .")" . PHP_EOL;
var_dump($unpackvar);
echo PHP_EOL;

$currentvar = current($unpackvar);
echo "currentvar (". gettype($currentvar) .")" . PHP_EOL;
var_dump($currentvar);
echo PHP_EOL;

$splitvar = str_split($currentvar, 8);
echo "splitvar (". gettype($splitvar) .")" . PHP_EOL;
var_dump($splitvar);
echo PHP_EOL;

$array_mapvar = array_map('strrev' ,$splitvar );
echo "array_mapvar (". gettype($array_mapvar) .")" . PHP_EOL;
var_dump($array_mapvar);
echo PHP_EOL;

$strtouppervar = strtoupper( implode('' , $array_mapvar) );
echo "strtouppervar (". gettype($strtouppervar) .")" . PHP_EOL;
var_dump($strtouppervar);
echo PHP_EOL;


$uid_encode = '6708A8C0E4EFF8582B1E180102341F05';
$encode_array_map  = array_map('strrev' , str_split($uid_encode, 8) );
var_dump($encode_array_map);
echo PHP_EOL;

$encode_current = implode('',$encode_array_map);
var_dump($encode_current);
echo PHP_EOL;

$encode_pack = pack('h*',$encode_current );
var_dump($encode_pack);
echo PHP_EOL;

$encode_base64_var = base64_encode($encode_pack);
var_dump($encode_base64_var);
echo PHP_EOL;
?>
