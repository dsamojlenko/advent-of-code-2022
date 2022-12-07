<?php

$input = file_get_contents(__DIR__ . '/input');

// Part 1
for ($i =0; $i <= strlen($input); $i++) {
    if(count(array_unique(str_split(substr($input, $i, 4)))) >= 4) {
        print $i + 4 . PHP_EOL; break;
    }
}

// Part 2
for ($i =0; $i <= strlen($input); $i++) {
    if(count(array_unique(str_split(substr($input, $i, 14)))) >= 14) {
        print $i + 14 . PHP_EOL; break;
    }
}
