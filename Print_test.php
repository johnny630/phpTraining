<?php
/**
 * echo , print , print_r
 * 
 * echo,print : 輸出字串中可以包含html及變數
 * print_r : 輸出陣列
 * 
 * PHP_EOL : 各平台的換行編碼
 * 
 * ----進階知識-----
 * The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.
 * PHP print 可以用來輸出 PHP 字串，用法與 echo 類似，嚴格來說 PHP print 本身並不是一個 PHP 函式，執行效率比 echo 稍微慢一點點，處理程序單純的情況下，兩者差異其實並不大，PHP print 可以用單引號輸出單純的字串，也可以用雙引號輸出變數值。
 */

// echo 輸出字串中可以包含html及變數
echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn PHP!<br>";
echo "This ", "string ", "was ", "made ", "with multiple parameters.";

$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>$txt1</h2>" . PHP_EOL;
echo "Study PHP at $txt2<br>". PHP_EOL;
echo $x + $y. PHP_EOL;

$arr1 = array('apple', 'book', 'cat' );
print_r($arr1);