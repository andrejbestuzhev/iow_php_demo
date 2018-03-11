<?php

require_once('functions.php');

class A
{
    public $variable = '';
    public $subObject = null;

    public function __construct($variable, $add = false)
    {
        $this->variable = $variable;
        if ($add) {
            $this->subObject = new A($variable+1, false);
        }
    }
}


$objects = [];
$memoryAtStart = memory_get_usage();

for ($i = 0; $i < 1000; $i++) {
    $objects[$i] = new A(rand(0, 1000000), true);
}
echo 'Used: ' . (memory_get_usage() - $memoryAtStart) . ' bytes' . "\n";
$objects = [];
echo 'Used: ' . (memory_get_usage() - $memoryAtStart) . ' bytes' . "\n";
unset($objects);
echo 'Used: ' . (memory_get_usage() - $memoryAtStart) . ' bytes' . "\n";
gc_collect_cycles();
echo 'Used: ' . (memory_get_usage() - $memoryAtStart) . ' bytes' . "\n";

/*
    php 7.1.8 // console
    Used: 205112 bytes
    Used: 8224 bytes
    Used: 8224 bytes
    Used: 8224 bytes
 */