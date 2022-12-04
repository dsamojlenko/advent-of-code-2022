<?php

$inputs = explode("\n", file_get_contents(__DIR__ . '/inputs'));

$alphabet = array_merge(range('a', 'z'), range('A', 'Z'));

$priorities = array_map(function($rucksack) use ($alphabet) {
    $split = strlen($rucksack) / 2;
    $compartment1 = substr($rucksack, 0, $split);
    $compartment2 = substr($rucksack, $split);
    $commonItems = array_values(array_intersect(str_split($compartment1), str_split($compartment2)));

    return array_search($commonItems[0], $alphabet) + 1;
}, $inputs);

print array_sum($priorities) . PHP_EOL;

// Part 2
$inputs = array_chunk(explode("\n", file_get_contents(__DIR__ . '/inputs')), 3);

$priorities = array_map(function($group) use ($alphabet) {
    $badges = array_values(array_intersect(...array_map(function($rucksack) {
        return str_split($rucksack);
    }, $group)));
    return array_search($badges[0], $alphabet) + 1;
}, $inputs);

print array_sum($priorities) . PHP_EOL;