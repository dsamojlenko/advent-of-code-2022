<?php

$input = explode("\n", file_get_contents(__DIR__ . '/input'));

$filesystem = [];
$here = ["root"];
$totalUsedSpace = 0;

function cd($arg) {
    global $filesystem;
    global $here;

    if($arg === "/") {
        $here = ["root"];
        return;
    }

    if($arg === "..") {
        array_pop($here);
        return;
    }

    array_push($here, $arg);
}

foreach($input as $line) {
    $cmd = explode(' ', $line);
    if ($cmd[0] === '$') {
        $lastCmd = $cmd[1];
        if ($cmd[1] === 'cd') {
            cd($cmd[2]);
        }
    } else {
        if($cmd[0] !== 'dir') {
            array_push($filesystem, implode('/', $here) . '/' . $cmd[0]);
        }
    }
}

$totals = [];

foreach ($filesystem as $path) {
    $savePath = '';
    $path = explode('/', $path);
    if(is_numeric(end($path))) {
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