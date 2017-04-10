<?php
define('DEFAULT_1', 'www');
define('DEFAULT_INT' , 5);
define('DEFAULT_ARRAY' , array(1,2,3,4,5));

echo DEFAULT_1 . PHP_EOL;
echo DEFAULT_INT . PHP_EOL;
foreach(DEFAULT_ARRAY as $val){
	echo $val;
}
?>
