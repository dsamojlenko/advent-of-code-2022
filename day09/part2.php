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

$ropePositions = [
    0 => [[ // head
        'x' => 0, 
        'y' => 0
    ]],
    1 => [[
        'x' => 0, 
        'y' => 0
    ]],
    2 => [[
        'x' => 0, 
        'y' => 0
    ]],
    3 => [[
        'x' => 0, 
        'y' => 0
    ]],
    4 => [[
        'x' => 0, 
        'y' => 0
    ]],
    5 => [[
        'x' => 0, 
        'y' => 0
    ]],
    6 => [[
        'x' => 0, 
        'y' => 0
    ]],
    7 => [[
        'x' => 0, 
        'y' => 0
    ]],
    8 => [[
        'x' => 0, 
        'y' => 0
    ]],
    9 => [[
        'x' => 0, 
        'y' => 0
    ]],
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

        array_push($ropePositions[0], $head);

        foreach($ropePositions as $part => $position) {
            if ($part === 0) {
                continue;
            }

            $current = end($ropePositions[$part]);
            $previous = end($ropePositions[$part - 1]);

            // If the head is 2 spaces up or down from the tail
            if ($previous['x'] === $current['x'] && abs($previous['y'] - $current['y']) === 2) {
                if ($previous['y'] < $current['y']) {
                    $previous['y']++;
                    array_push($ropePositions[$part], $previous);
                } else {
                    $previous['y']--;
                    array_push($ropePositions[$part], $previous);
                }
            }

            // If the head is 2 spaces left or right from the tail
            if ($previous['y'] === $current['y'] && abs($previous['x'] - $current['x']) === 2) {
                if ($previous['x'] < $current['x']) {
                    $previous['x']++;
                    array_push($ropePositions[$part], $previous);
                } else {
                    $previous['x']--;
                    array_push($ropePositions[$part], $previous);
                }
            }

            // diagonals
            if ( (abs($previous['x'] - $current['x']) === 1) && (abs($previous['y'] - $current['y']) === 2)) {
                if(($current['x'] - $previous['x']) > 0 && ($current['y'] - $previous['y']) > 0) {
                    $previous['x']++;
                    $previous['y']++;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) > 0 && ($current['y'] - $previous['y']) < 0) {
                    $previous['x']++;
                    $previous['y']--;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) < 0 && ($current['y'] - $previous['y']) > 0) {
                    $previous['x']--;
                    $previous['y']++;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) < 0 && ($current['y'] - $previous['y']) < 0) {
                    $previous['x']--;
                    $previous['y']--;
                    array_push($ropePositions[$part], $previous);
                }
            }

            if ( (abs($previous['x'] - $current['x']) === 2) && (abs($previous['y'] - $current['y']) === 1)) {
                if(($current['x'] - $previous['x']) > 0 && ($current['y'] - $previous['y']) > 0) {
                    $previous['x']++;
                    $previous['y']++;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) > 0 && ($current['y'] - $previous['y']) < 0) {
                    $previous['x']++;
                    $previous['y']--;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) < 0 && ($current['y'] - $previous['y']) > 0) {
                    $previous['x']--;
                    $previous['y']++;
                    array_push($ropePositions[$part], $previous);
                }
                if(($current['x'] - $previous['x']) < 0 && ($current['y'] - $previous['y']) < 0) {
                    $previous['x']--;
                    $previous['y']--;
                    array_push($ropePositions[$part], $previous);
                }
            }
        }
    }
}

$uniquePositions = array_map("unserialize", array_unique(array_map("serialize", $ropePositions[9])));

print count($uniquePositions) . PHP_EOL;
