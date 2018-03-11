<?php

require_once('functions.php');

$time1 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $a[$i] = rand(0, 100000);
}
$resultTime1 = (microtime_float() - $time1) . 's';


$b = array();
$b = array_fill(0, 100000, 1);
$time2 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $b[$i] = rand(0, 100000);
}
$resultTime2 = (microtime_float() - $time2) . 's';

echo "\n\nresult 1 time: " . $resultTime1;
echo "\n\nresult 2 time: " . $resultTime2;

/*
php 7.1.8 // console
result 1 time: 0.018637180328369s
result 2 time: 0.01513409614563s

php 5.5.34, // sandbox.onlinephpfunctions.com
result 1 time: 0.038748979568481s
result 2 time: 0.025491952896118s
*/