<?php

require_once('functions.php');

$time1 = microtime_float();
for ($i = 0; $i < 500000; $i++) {
    echo "1" . "\n";
}

$resultTime1 = (microtime_float() - $time1) . 's';


$time2 = microtime_float();
ob_start();
for ($i = 0; $i < 500000; $i++) {
    echo "1" . "\n";
}
$result = ob_get_contents();
ob_clean();
echo $result;
$resultTime2 = (microtime_float() - $time2) . 's';

echo "\n\nresult 1 time: " . $resultTime1;
echo "\n\nresult 2 time: " . $resultTime2;

/* 5.5.34 // sandbox.onlinephpfunctions.com
result 1 time: 0.091876983642578s
result 2 time: 0.054245948791504s

php 7.1.0 // sandbox.onlinephpfunctions.com
result 1 time: 0.027306079864502s
result 2 time: 0.023269176483154s

php 7.1.8 // console
result 1 time: 2.7287797927856s
result 2 time: 0.020446062088013s

*/
?>