<?php
/**
 * code.Sets,
 * 
 * Array
 * Associative arrays
 * Multidimensional Arrays
 */

////array
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo PHP_EOL;
}


////associative arrays
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo PHP_EOL;
}


////Multidimensional Arrays
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );

for ($row = 0; $row < count($cars); $row++) {
  echo "Row number $row".PHP_EOL;
  echo "-----------" .PHP_EOL;
  for ($col = 0; $col < 3; $col++) {
    echo "".$cars[$row][$col]."//";
  }
  echo PHP_EOL;
  echo "-----------" .PHP_EOL;
}