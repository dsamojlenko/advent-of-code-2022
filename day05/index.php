<?php

$input = explode("\n\n", file_get_contents(__DIR__ . '/input'));

$stacks = $input[0];
$moves = $input[1];

$reversed = array_reverse(explode("\n", $stacks));

print_r($reversed);

$stackArray = [];

foreach($reversed as $index => $crates)
{
    if($index < 1) continue;

    for ($i = 1; $i <= 33; $i+=4) {
        $stackArray[$index -1][] = substr($crates, $i , 1);
    }
}

print_r($stackArray);