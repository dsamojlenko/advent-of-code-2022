<?php

$input = explode("\n", file_get_contents(__DIR__ . '/input'));

$filesystem = [];
$here = ["root"];

foreach($input as $line) {
    list($start, $cmd, $dir) = array_pad(explode(' ', $line), 3, null);
    if ($start === '$') {
        $lastCmd = $cmd;
        if ($cmd === 'cd') {
            if ($dir === "/") {
                $here = ["root"];
            } elseif ($dir === "..") {
                array_pop($here);
            } else {
                array_push($here, $dir);
            }
        }
    } else {
        if($start !== 'dir') {
            array_push($filesystem, implode('/', $here) . '/' . $start);
        }
    }
}

$totals = [];

foreach ($filesystem as $path) {
    $savePath = '';
    $path = explode('/', $path);
    foreach ($path as $segment) {
        $savePath = $savePath . '/' . $segment;
        if (!is_numeric($segment)) {
            if(array_key_exists($savePath, $totals)) {
                $totals[$savePath] += end($path);
            } else {
                $totals[$savePath] = end($path);
            }
        }
    }
}

$totalsLessThan100000 = array_filter($totals, function($total) {
    return $total <= 100000;
});

$answer = array_sum($totalsLessThan100000);

print "Part 1: $answer \n";

// Part 2

$totalDiskSpace = 70000000;
$totalNeededSpace = 30000000;

$totalUsedSpace = $totals["/root"];

$unusedSpace = $totalDiskSpace - $totalUsedSpace;

$neededSpace = $totalNeededSpace - $unusedSpace;

$options = array_filter($totals, function($total) use ($neededSpace) {
    return $total >= $neededSpace;
});

sort($options);

print "Part 2: " . $options[0] . PHP_EOL;