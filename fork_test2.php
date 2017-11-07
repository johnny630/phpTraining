<?php
$pid = pcntl_fork(); //在這裡開始產生程式的分岔
if ($pid == -1) {
     die('無法產生子程序');
} else if ($pid) {
    echo '父程序會進入這裡' , PHP_EOL;
    // 父程序會進入這裡
} else {
    echo '子程序會進入這裡' , PHP_EOL; 
    // 子程序會進入這裡
}
?>
