<?php

require_once('functions.php');

$a = true;
$b = false;

$time1 = microtime_float();
for ($i = 0; $i < 1000000; $i++) {
    if ($a || $b) {
        // do something
    }
}
$resultTime1 = (microtime_float() - $time1) . 's';

$time2 = microtime_float();
for ($i = 0; $i < 1000000; $i++) {
    if ($a && $b) {
        // do something
    }
}
$resultTime2 = (microtime_float() - $time2) . 's';
$time3 = microtime_float();
for ($i = 0; $i < 1000000; $i++) {
    if ($a && !$b) {
        // do something
    }
}
$resultTime3 = (microtime_float() - $time3) . 's';
echo "\n\nresult 1 time: " . $resultTime1;
echo "\n\nresult 2 time: " . $resultTime2;
echo "\n\nresult 3 time: " . $resultTime3;

/*
php 7.1.8 // console
result 1 time: 0.023914098739624s
result 2 time: 0.023403167724609s
result 3 time: 0.025225162506104s

php 5.5.34, // sandbox.onlinephpfunctions.com
result 1 time: 0.046463012695312s
result 2 time: 0.056411027908325s
result 3 time: 0.060635805130005s
*/