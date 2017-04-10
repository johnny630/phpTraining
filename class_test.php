<?php
class TestClass{
    const var1 = 2 ;
    const array1 = array(1,2,3,4,5);

    function add($a , $b){
        return $a+$b;
    }

    function double($a){
        return $a * self::var1;
    }
}

$test_class = new TestClass;
echo $test_class->double(10) . PHP_EOL;

print_r( $test_class::array1);

?>