<?php

require __DIR__ . '/../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/input');

$forest = array_map(function($row) {
    return str_split($row);
}, explode("\n", $input));

$visibleTrees = 0;

foreach($forest as $y => $treeRow) {
    if ($y === 0 || $y === count($forest)-1) {
        $visibleTrees += count($treeRow);
    }
    
    foreach($treeRow as $x => $tree) {
        $treeColumn = array_column($forest, $x);

        if ($y > 0 && $y < count($forest)-1) { // first and last row already counted
            if ($x === 0 || $x === count($treeRow) -1) {
                $visibleTrees++;
                continue;
            }
            // Look left
            $leftTrees = array_slice($treeRow, 0, $x);
            if($leftTrees && max($leftTrees) < $tree) {
                $visibleTrees++;
                continue;
            }
            // Look right
            $rightTrees = array_slice($treeRow, $x + 1, count($treeRow) -1);
            if($rightTrees && max($rightTrees) < $tree) {
                $visibleTrees++;
                continue;
            }

            // Look up
            $upTrees = array_slice($treeColumn, 0, $y);
            if($upTrees && max($upTrees) < $tree) {
                $visibleTrees++;
                continue;
            }

            // Look down
            $downTrees = array_slice($treeColumn, $y+1, count($treeColumn));
            if($downTrees && max($downTrees) < $tree) {
                $visibleTrees++;
                continue;
            }
            //eval(\Psy\sh());
        }
    }
}

print "Part 1: $visibleTrees \n";

// Part 2

$scenicScores = [];

foreach($forest as $y => $treeRow) {
    foreach($treeRow as $x => $tree) {
        $treeColumn = array_column($forest, $x);

        // Look left
        $leftVisibility = 0;
        $leftTrees = array_reverse(array_slice($treeRow, 0, $x));
        foreach ($leftTrees as $check) {
            if($check >= $tree) {
                $leftVisibility++;
                break;
            }
            $leftVisibility++;
        }

        // Look right
        $rightVisibility = 0;
        $rightTrees = array_slice($treeRow, $x + 1, count($treeRow) -1);
        foreach($rightTrees as $check) {
            if($check >= $tree) {
                $rightVisibility++;
                break;
            }
            $rightVisibility++;
        }

        // Look up
        $upVisibility = 0;
        $upTrees = array_reverse(array_slice($treeColumn, 0, $y));
        foreach($upTrees as $check) {
            if($check >= $tree) {
                $upVisibility++;
                break;
            }
            $upVisibility++;
        }

        // Look down
        $downVisibility = 0;
        $downTrees = array_slice($treeColumn, $y+1, count($treeColumn));
        foreach($downTrees as $check) {
            if($check >= $tree) {
                $downVisibility++;
                break;
            }
            $downVisibility++;
        }

        $scenicScore = $leftVisibility * $rightVisibility * $upVisibility * $downVisibility;

        // eval(\Psy\sh());
        array_push($scenicScores, $scenicScore);
    }
}

print "Part 2: " . max($scenicScores);