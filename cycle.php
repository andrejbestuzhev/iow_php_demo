<?php

require_once('functions.php');

$array1 = array_fill(0, 1000000, 1);
$time1 = microtime_float();
for ($i = 0, $c = count($array1); $i < $c; $i++) {
    $array1[$i]++;
}
$resultTime1 = (microtime_float() - $time1) . 's';
echo "\n\nresult 1 time: " . $resultTime1;

$time2 = microtime_float();
foreach ($array1 as $key => $value) {
    $array1[$key]++;
}
$resultTime2 = (microtime_float() - $time2) . 's';

echo "\n\nresult 2 time: " . $resultTime2;

/*
php 7.1.8 // console
result 1 time: 0.034876108169556s
result 2 time: 0.051276922225952s

*/