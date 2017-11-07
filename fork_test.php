<?php
$childs = array();

// Fork some process.
for($i = 0; $i < 10; $i++) {
    $pid = pcntl_fork();
    echo "pid:$pid". PHP_EOL;
    if($pid == -1)
        die('Could not fork');

    if ($pid) {
        echo "pid:$pid parent \n";
        $childs[] = $pid;
    } else {
        // Sleep $i+1 (s). The child process can get this parameters($i).
        echo "pid:$pid sleep ". ($i+1) . "s" .PHP_EOL; 
	sleep($i+1);
         
        // The child process needed to end the loop.
        exit();
    }
}

while(count($childs) > 0) {
    echo PHP_EOL;
    foreach($childs as $key => $pid) {
        $res = pcntl_waitpid($pid, $status, WNOHANG);
        echo "pro pid:$pid" . PHP_EOL; 
        //If the process has already exited
        if($res == -1 || $res > 0)
            unset($childs[$key]);
    }
    
    sleep(1);
}
?>
