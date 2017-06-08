<?php
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

?>