<?php
/**
code.Variables.常數,
code.Variables.型態,
code.Variables.範圍生命週期,
 */
/*******************************/
/**
 * code.Variables.常數,
 * define(name, value, case-insensitive)
 * 
 * Syntax
 * define(name, value, case-insensitive)
 *      name: Specifies the name of the constant
 *      value: Specifies the value of the constant
 *      case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false
 *      
 * Constants are automatically global and can be used across the entire script.
 */
define("GREETING", "Welcome to W3Schools.com!");
echo GREETING . PHP_EOL;

function myTest() {
    echo GREETING .PHP_EOL;
} 
myTest();


/*******************************/
/**
 * code.Variables.型態,
 * 
 * boolean , integer , double , string , array , object , resource , NULL , unknown type , Variable variables
 * 
 * Resource :
 * The special resource type is not an actual data type. It is the storing of a reference to functions and resources external to PHP.
 * A common example of using the resource data type is a database call.
 */
$data = array(true, 1, 1.0, NULL, new stdClass, 'foo' , array(1,2,3));

foreach ($data as $value) {
    echo gettype($value), PHP_EOL;
}

////Variable variables 可變變數
$user = "fool";
$fool = "lala";
$lala = "黃色";
echo $$fool, PHP_EOL;
echo $${$user}, PHP_EOL;

/*******************************/
/**
 * code.Variables.範圍生命週期,
 * 
 * local , global , static , parameter
 */
$a = 5; // 全域
 
function myTest2()
{
    //echo $a; // 區域
    global $a; // global
    echo $a .PHP_EOL;
}
 
myTest2();

function myTest3(){
    static $c; // static
    $c++;
    echo "static number is : $c " , PHP_EOL;
}
myTest3();
myTest3();


////parameter by val
function myTest4($i){
    $i++;
    echo "parameter is : $i" , PHP_EOL;
}
$i = 0;
myTest4($i);
myTest4($i);
echo "parameter is : $i" , PHP_EOL;

////parameter by ref
function myTest5(&$i2){
    $i2++;
    echo "parameter i2 is : $i2" , PHP_EOL;
}
$i2 = 0;
myTest5($i2);
myTest5($i2);
echo "parameter i2 is : $i2" , PHP_EOL;


echo PHP_EOL;