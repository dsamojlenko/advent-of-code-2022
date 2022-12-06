<?php

$input = explode("\n\n", file_get_contents(__DIR__ . '/input'));

list($stacks, $moves) = $input;
$stacks = explode("\n", $stacks);
array_pop($stacks);
$stacks = array_reverse($stacks);

$stacks = array_map(function ($row) {
    return array_map("trim", explode ("\r\n", chunk_split($row, 4)));
}, $stacks);

$columns = array_map('array_filter', array_map(null, ...$stacks));

$moves = array_map(function($move) {
    return explode(" ", $move);
}, explode("\n", $moves));

list($move, $from, $to) = [1, 3, 5];

foreach($moves as $action)
{
    foreach(range(1, $action[$move]) as $index) {
        array_push($columns[$action[$to]-1], array_pop($columns[$action[$from]-1]));
    }
}

foreach($columns as $column) {
    print str_replace(['[', ']'], '', end($column));
}

print PHP_EOL;

$columns = array_map('array_filter', array_map(null, ...$stacks));

foreach($moves as $action)
{
    array_push($columns[$action[$to]-1], ...array_splice($columns[$action[$from]-1], -$action[$move], $action[$move]));
}

foreach($columns as $column) {
    print str_replace(['[', ']'], '', end($column));
}

print PHP_EOL;