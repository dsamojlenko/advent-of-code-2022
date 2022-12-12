<?php

require __DIR__ . '/../vendor/autoload.php';

$input = explode("\n", file_get_contents(__DIR__ . '/test'));

print_r($input);

$x = 1;

$cycles = [];

$interesting = [];

foreach($input as $line) {
    if ($line === 'noop') {
        array_push($cycles, 0);
        continue;
    }

    $parts = explode(' ', $line);

    array_push($cycles, 0);
    array_push($cycles, 0);
    array_push($cycles, $parts[1]);
}

foreach($cycles as $cycle => $add) {
    $x += $add;
    if ($cycle === 20) {
        array_push($interesting, $x * 20);
    }
    if (($cycle - 20) % 40 === 0 && $cycle !== 20) {
        array_push($interesting, $x * 20);
    }
}

print_r($interesting);

print array_sum($interesting);

// for ($i = 0; $i < $cycles; $i++) {
//     $turn = input[$i];

//     if ($turn === 'noop') {
//         $cycles++;
//         continue;
//     }

//     $parts = explode(' ', $turn);

//     array_push($queue, [
//         'turns' => 2,
//         'add' => $parts[1],
//     ]);



// }


// foreach ($input as $cycle => $line) {
//     $executables = array_filter($queue, function ($turn) {
//         return $turn['turns'] === 0;
//     });

//     if (count($executables)) {
//         foreach($executables as $index => $execute) {
//             $x += $execute['add'];
//         }

//         unset($queue[$index]);
//     }
    
//     $queue = array_map(function ($turn) {
//         $turn['turns']--;

//         return $turn;
//     }, $queue);

//     if ($cycle === 20) {
//         array_push($interesting, [
//             '20' => $x * 20
//         ]);
//     }

//     if (($cycle - 20) % 40 === 0) {
//         array_push($interesting, [
//             $cycle => $x * 20
//         ]);
//     }

//     if ($line === 'noop') {
//         continue;
//     }

//     $parts = explode(' ', $line);

//     array_push($queue, [
//         'turns' => 2,
//         'add' => $parts[1],
//     ]);
// }

// print_r($queue);

// print_r($interesting);