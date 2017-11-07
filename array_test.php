<?php
/*
 * 陣列相關測試
 */

//test 陣列無此索引，是否會引發錯誤
//結果是不會，用isset可以判斷
echo "test 陣列無此索引，是否會引發錯誤" .PHP_EOL;
$test_arr_index = array(1,2,3);
if (isset($test_arr_index[2]) && !empty($test_arr_index[2])){
    echo "有此索引: $test_arr_index[2] " . PHP_EOL;
}else{
    echo "無此索引 2:" . PHP_EOL;
}

if (isset($test_arr_index[3])  && !empty($test_arr_index[3])){
    echo "有此索引: $test_arr_index[3] " . PHP_EOL;
}else{
    echo "無此索引 3:" . PHP_EOL;
}

//Sort an array by the length of its values
$test_arr = array("a"=>[1,2,3] , "b"=>[2,3] , "c"=>[2,3] , "d"=>[1,2,3,4] , "e"=>[1]);
print_r ($test_arr);
usort($test_arr, function($a, $b) {
    return count($b) - count($a);
});
print_r ($test_arr);


//test array_push
echo 'test array_push';
$test_arr = [1, 2, 3];
array_push ($test_arr , 3 ,4);
print_r ($test_arr);


//string split multi array
echo 'string split multi array'.PHP_EOL;
$test_arr = '25.041171,121.565228_25.041171,121.565228';
$latlonPolygon = array_map (
                function ($_) {return explode (',', $_);},
                explode ('_', $test_arr)
            );
print_r ($latlonPolygon);




//php array remove repeated values
echo "\nphp array remove repeated values\n";
$unique_array = array("/test1/test1", "/test2/test2", "test1/test1", "/test1/test1" , "/test3/test3");
$array_2 = array(1,2,3,4);
echo 'array index:' . $unique_array[0] . PHP_EOL;
echo 'array last index:' . end($array_2) . PHP_EOL;
if(end($array_2)==4){
    echo 'array last index:' . end($array_2) . PHP_EOL;
}
print_r( array_unique($unique_array) );
print_r( $unique_array );



//basic test
$array_test = array();
$array_test['type'][] = "1";
$array_test['type'][] = "2";
echo "----------\n";
echo print_r( $array_test['type'] );
echo "----------\n";
$array_test['type'] = array("3");
print_r( $array_test['type'] ) ;

//array_map
//array_map() 函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
$string = "1,2,3";
$ids = explode(',', $string);
var_dump($ids); //是字串型態

$integerIDs = array_map('intval', explode(',', $string));
var_dump($integerIDs); //轉型int

//測試array empty
$a = [];
if(isset($a) && !empty($a)){
	echo 'array not empty';
}else{
	echo 'array empty';
}

//
$c = ["a"=>"a" , "b"=>23];
print_r ($c);

?>
