<?php

$input = explode("\n\n", file_get_contents(__DIR__ . '/input'));

$stacks = $input[0];
$moves = $input[1];

$reversed = array_reverse(explode("\n", $stacks));

$stackArray = [];

foreach($reversed as $index => $crates)
{
    if($index < 1) continue;

    for ($i = 1; $i <= 33; $i+=4) {
        $stackArray[$index][] = trim(substr($crates, $i , 1));
    }
}

$columns = [];

for ($i = 0; $i < 9; $i++) {
    array_push($columns, array_filter(array_column($stackArray, $i)));
}

$moves = array_map(function($move) {
    $exploded = explode(" ", $move);
    return [
        $exploded[0] => $exploded[1],
        $exploded[2] => $exploded[3],
        $exploded[4] => $exploded[5]
    ];
}, explode("\n", $moves));

foreach($moves as $act)
{
    foreach(range(1, $act['move']) as $index) {
        array_push($columns[$act['to']-1], array_pop($columns[$act['from']-1]));
    }
}

foreach($columns as $column) {
    print end($column);
}

print PHP_EOL;

// Part 2
$columns = [];

for ($i = 0; $i < 9; $i++) {
    array_push($columns, array_filter(array_column($stackArray, $i)));
}

foreach($moves as $move)
{
    array_push($columns[$move['to']-1], ...array_splice($columns[$move['from']-1], -$move['move'], $move['move']));
}

foreach($columns as $column) {
    print end($column);
}

print PHP_EOL;