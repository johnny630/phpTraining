<?php
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