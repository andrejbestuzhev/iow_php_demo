<?php

require_once "functions.php";

// without type conversion

$string = '';
$time1 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $string .= 'a';
}

$resultTime1 = (microtime_float() - $time1) . 's';
echo "\n\nresult 1 time: " . $resultTime1;

$string = '';
$time2 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $string = sprintf($string, 'a');
}

$resultTime2 = (microtime_float() - $time2) . 's';
echo "\n\nresult 2 time: " . $resultTime2;

// with type conversion

$string = '';
$time3 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $string .= $i;
}

$resultTime3 = (microtime_float() - $time3) . 's';
echo "\n\nresult 3 time: " . $resultTime3;

$string = '';
$time4 = microtime_float();
for ($i = 0; $i < 100000; $i++) {
    $string = sprintf($string, $i);
}

$resultTime4 = (microtime_float() - $time4) . 's';
echo "\n\nresult 4 time: " . $resultTime4;

/* php 5.5.5, 5.6.29 // sandbox.onlinephpfunctions.com
result 1 time: 0.0071308612823486s
result 2 time: 0.022873878479004s
result 3 time: 0.016571998596191s
result 4 time: 0.017836093902588s

php 7.1.8 // console
result 1 time: 0.0051569938659668s
result 2 time: 0.0077049732208252s
result 3 time: 0.00925612449646s
result 4 time: 0.0077710151672363s
*/