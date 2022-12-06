<?php

$input = explode("\n\n", file_get_contents(__DIR__ . '/input'));

$stacksOriginal = [
    ['D', 'T', 'W', 'F', 'J', 'S', 'H', 'N'],
    ['H', 'R', 'P', 'Q', 'T', 'N', 'B', 'G'],
    ['L', 'Q', 'V'],
    ['N', 'B', 'S', 'W', 'R', 'Q'],
    ['N', 'D', 'F', 'T', 'V', 'M', 'B'],
    ['M', 'D', 'B', 'V', 'H', 'T', 'R'],
    ['D', 'B', 'Q', 'J'],
    ['D', 'N', 'J', 'V', 'R', 'Z', 'H', 'Q'],
    ['B', 'N', 'H', 'M', 'S']
];

$stacks = $stacksOriginal;

$moves = array_map(function($move) {
    return explode(" ", $move);
}, explode("\n", $input[1]));

list($move, $from, $to) = [1, 3, 5];

foreach($moves as $action)
{
    foreach(range(1, $action[$move]) as $index) {
        array_push($stacks[$action[$to]-1], array_pop($stacks[$action[$from]-1]));
    }
}

foreach($stacks as $stack) {
    print end($stack);
}

// Part 2

print PHP_EOL;

$stacks = $stacksOriginal;

foreach($moves as $action)
{
    array_push($stacks[$action[$to]-1], ...array_splice($stacks[$action[$from]-1], -$action[$move], $action[$move]));
}

foreach($stacks as $stack) {
    print end($stack);
}

print PHP_EOL;