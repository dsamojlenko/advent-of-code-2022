<?php

$inputs = array_map(function($sections) {
    return array_map(function($section) {
        return explode("-", $section);
    }, explode(",", $sections));
}, explode("\n", file_get_contents(__DIR__ . '/inputs')));

$overlappingSections = array_filter($inputs, function($section) {
    $section1 = range($section[0][0], $section[0][1]);
    $section2 = range($section[1][0], $section[1][1]);
    $overlap = array_intersect($section1, $section2);
    if(count($overlap) === count($section1) || count($overlap) === count($section2)) {
        return true;
    }
});

print count($overlappingSections) . PHP_EOL;

// Part 2

$overlappingSections = array_filter($inputs, function($section) {
    $section1 = range($section[0][0], $section[0][1]);
    $section2 = range($section[1][0], $section[1][1]);
    $overlap = array_intersect($section1, $section2);
    if(count($overlap) > 0) {
        return true;
    }
});

print count($overlappingSections) . PHP_EOL;