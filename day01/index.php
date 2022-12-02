<?php

$sums = array_map(function($group) {
    return array_sum(explode("\n", $group));
}, explode("\n\n", file_get_contents(__DIR__ . '/inputs')));

// Part 1
echo max($sums) . "\n";

sort($sums);

// Part 2
echo array_sum(array_slice($sums, -3, 3)) . PHP_EOL;