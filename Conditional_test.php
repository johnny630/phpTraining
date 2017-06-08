<?php
/**
 * code.Conditional,
 * 
 * if
 * if...else
 * if...elseif....else
 * switch
 * for
 * foreach
 * while
 * do...while
 */

////if
$t = date("H");

if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
echo PHP_EOL;


////switch
$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
echo PHP_EOL;

////for
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x ".PHP_EOL;
} 

////foreach
$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $value) {
    echo "$value ".PHP_EOL;
}

////while
$x = 1; 

while($x <= 5) {
    echo "The number is: $x ".PHP_EOL;
    $x++;
} 


////do...while
$x = 6;

do {
    echo "The number is: $x ".PHP_EOL;
    $x++;
} while ($x <= 5);