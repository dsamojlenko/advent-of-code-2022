<?php

require __DIR__ . '/../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/input');



$moves = array_map(function ($move) {
    $move = explode(" ", $move);
    return [
        "dir" => $move[0],
        "num" => $move[1]
    ];
}, explode("\n", $input));

print_r($moves);

$head = [
    'x' => 0, 
    'y' => 0
];
$tail = [
    'x' => 0, 
    'y' => 0
];

$tailSpaces = -1;

foreach($moves as $move) {
    for ($i = 0; $i <= $move["num"]; $i++) {
        if ($move["dir"] === "U") {
            $head['y']++;
        }

        if ($move["dir"] === "D") {
            $head['y']--;
        }

        if ($move["dir"] === "R") {
            $head['x']++;
        }

        if ($move["dir"] === "L") {
            $head['x']--;
        }

        // If the head is 2 spaces up or down from the tail
        if ($tail['x'] === $head['x'] && abs($tail['y'] - $head['y']) === 2) {
            if ($tail['y'] < $head['y']) {
                $tail['y']++;
            } else {
                $tail['y']--;
            }
        }

        // If the head is 2 spaces left or right from the tail
        if ($tail['y'] === $head['y'] && abs($tail['x'] - $head['x']) === 2) {
            if ($tail['x'] < $head['x']) {
                $tail['x']++;
            } else {
                $tail['x']--;
            }
        }
        
        // diagonals
        if ( (abs($tail['x'] - $head['x']) === 1) && (abs($tail['y'] - $head['y']) === 2)) {

        }

        if ( (abs($tail['y'] - $head['y']) === 1) && (abs($tail['x'] - $head['x']) === 2)) {

        }
    }
}

