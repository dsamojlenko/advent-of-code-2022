<?php

$inputs = explode("\n", file_get_contents(__DIR__ . '/input'));

$totalPoints = 0;

$points = [
    'B X' => 1, // Loss
    'C Y' => 2, // Loss
    'A Z' => 3, // Loss
    'A X' => 4, // Draw
    'B Y' => 5, // Draw
    'C Z' => 6, // Draw
    'C X' => 7, // Win
    'A Y' => 8, // Win
    'B Z' => 9, // Win
];

foreach ($inputs as $match) {
    $totalPoints += $points[$match];
}

print $totalPoints . PHP_EOL;

// Part 2
$totalPoints = 0;

$points = [
    'B X' => 1, // Loss
    'C X' => 2, // Loss
    'A X' => 3, // Loss
    'A Y' => 4, // Draw
    'B Y' => 5, // Draw
    'C Y' => 6, // Draw
    'C Z' => 7, // Win
    'A Z' => 8, // Win
    'B Z' => 9, // Win
];

foreach ($inputs as $match) {
    $totalPoints += $points[$match];
}

print $totalPoints . PHP_EOL;