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

$head = [
    'x' => 0, 
    'y' => 0
];
$tail = [
    'x' => 0, 
    'y' => 0
];

$tailPositions = [
    [
        'x' => 0, 
        'y' => 0
    ]
];

foreach($moves as $move) {
    for ($i = 1; $i <= $move["num"]; $i++) {
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
                array_push($tailPositions, $tail);
            } else {
                $tail['y']--;
                array_push($tailPositions, $tail);
            }
        }

        // If the head is 2 spaces left or right from the tail
        if ($tail['y'] === $head['y'] && abs($tail['x'] - $head['x']) === 2) {
            if ($tail['x'] < $head['x']) {
                $tail['x']++;
                array_push($tailPositions, $tail);
            } else {
                $tail['x']--;
                array_push($tailPositions, $tail);
            }
        }
        
        // diagonals
        if ( (abs($tail['x'] - $head['x']) === 1) && (abs($tail['y'] - $head['y']) === 2)) {
            if(($head['x'] - $tail['x']) > 0 && ($head['y'] - $tail['y']) > 0) {
                $tail['x']++;
                $tail['y']++;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) > 0 && ($head['y'] - $tail['y']) < 0) {
                $tail['x']++;
                $tail['y']--;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) < 0 && ($head['y'] - $tail['y']) > 0) {
                $tail['x']--;
                $tail['y']++;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) < 0 && ($head['y'] - $tail['y']) < 0) {
                $tail['x']--;
                $tail['y']--;
                array_push($tailPositions, $tail);
            }
        }

        if ( (abs($tail['x'] - $head['x']) === 2) && (abs($tail['y'] - $head['y']) === 1)) {
            if(($head['x'] - $tail['x']) > 0 && ($head['y'] - $tail['y']) > 0) {
                $tail['x']++;
                $tail['y']++;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) > 0 && ($head['y'] - $tail['y']) < 0) {
                $tail['x']++;
                $tail['y']--;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) < 0 && ($head['y'] - $tail['y']) > 0) {
                $tail['x']--;
                $tail['y']++;
                array_push($tailPositions, $tail);
            }
            if(($head['x'] - $tail['x']) < 0 && ($head['y'] - $tail['y']) < 0) {
                $tail['x']--;
                $tail['y']--;
                array_push($tailPositions, $tail);
            }
        }
    }
}

$uniquePositions = array_map("unserialize", array_unique(array_map("serialize", $tailPositions)));

print count($uniquePositions) . PHP_EOL;
