<?php

$inputs = explode("\n\n", file_get_contents(__DIR__ . '/inputs'));

$sums = array_map(function($group) {
    return array_sum(explode("\n", $group));
}, $inputs);

// Part 1
print max($sums) . "\n";

sort($sums);

$top3 = array_slice($sums, -3, 3);

// Part 2
print array_sum($top3) . PHP_EOL;