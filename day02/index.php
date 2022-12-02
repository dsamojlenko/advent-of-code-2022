<?php

$time_start = microtime(true);
require_once __DIR__ . '/index1.php';
$time_end = microtime(true);
print "Time: " . ($time_end - $time_start) . "\n";

$time_start = microtime(true);
require_once __DIR__ . '/index2.php';
$time_end = microtime(true);
print "Time: " . ($time_end - $time_start) . "\n";

$time_start = microtime(true);
require_once __DIR__ . '/index3.php';
$time_end = microtime(true);
print "Time: " . ($time_end - $time_start) . "\n";