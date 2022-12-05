<?php

$totalPoints = 0;

$inputs = explode("\n", file_get_contents(__DIR__ . '/input'));

$inputs = array_map(function($match) {
    return explode(" ", $match);
}, $inputs);

$rules = [
    'X' => [
        'name' => 'Rock',
        'beats' => 'C',
        'matches' => 'A',
        'points' => 1,
    ],
    'Y' => [
        'name' => 'Paper',
        'beats' => 'A',
        'matches' => 'B',
        'points' => 2,
    ],
    'Z' => [
        'name' => 'Scissors',
        'beats' => 'B',
        'matches' => 'C',
        'points' => 3,
    ],
];

foreach ($inputs as $match) {
    $them = $match[0];
    $me = $match[1];

    $totalPoints += $rules[$me]['points']; // points for symbol

    if($rules[$me]['beats'] === $them) {
        $totalPoints += 6; // points for win
    }

    if($rules[$me]['matches'] === $them) {
        $totalPoints += 3; // points for match
    }
}

print $totalPoints . PHP_EOL;

// Part 2

$totalPoints = 0;

$rules = [
    'A' => [
        'name' => 'Rock',
        'beats' => 'C',
        'beatBy' => 'B',
        'matches' => 'A',
        'points' => 1,
    ],
    'B' => [
        'name' => 'Paper',
        'beats' => 'A',
        'beatBy' => 'C',
        'matches' => 'B',
        'points' => 2,
    ],
    'C' => [
        'name' => 'Scissors',
        'beats' => 'B',
        'beatBy' => 'A',
        'matches' => 'C',
        'points' => 3,
    ],
];

foreach ($inputs as $match) {
    $them = $match[0];
    $result = $match[1];

    // Lose
    if ($result === 'X') {
        $totalPoints += $rules[$rules[$them]['beats']]['points'];
    }

    // Draw
    if ($result === 'Y') {
        $totalPoints += 3;
        $totalPoints += $rules[$them]['points'];
    }

    // Win
    if ($result === 'Z') {
        $totalPoints += 6;
        $totalPoints += $rules[$rules[$them]['beatBy']]['points'];
    }
}

print $totalPoints . PHP_EOL;