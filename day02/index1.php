<?php

print "================================\n";
print "Attempt 1: \n";

$inputs = explode("\n", file_get_contents(__DIR__ . '/inputs'));

$inputs = array_map(function($match) {
    return explode(" ", $match);
}, $inputs);

$A = $X = 1;
$B = $Y = 2;
$C = $Z = 3;

$totalScore = 0;

foreach($inputs as $match) {
    $me = $match[1];
    $them = $match[0];

    if (${$me} === 1) {
        $totalScore += 1; // 1 point for rock
        if (${$them} === 3) {
            $totalScore += 6; // rock > scissors
        }
    }
    if (${$me} === 2) {
        $totalScore += 2; // 2 points for paper
        if (${$them} === 1) {
            $totalScore += 6;  // paper > rock
        }
    }
    if (${$me} === 3) {
        $totalScore += 3; // 3 points for scissors
        if (${$them} === 2) {
            $totalScore += 6; // scissors > paper
        }
    }

    // 3 points for draws
    if (${$me} === ${$them}) {
        $totalScore += 3;
    }
}

print $totalScore . PHP_EOL;

// Part 2

$totalScore = 0;

foreach($inputs as $match) {
    $them = ${$match[0]};
    $expectedResult = ${$match[1]};

    // Win
    if ($expectedResult === 3) {
        $totalScore += 6; // 6 for the win
        switch ($them) {
            case 1:
                $totalScore += 2; // 2 points for paper
                break;
            case 2:
                 $totalScore += 3; // 3 points for scissors
                break;
            case 3:
                $totalScore += 1; // 1 point for rock
                break;
        }
    }

    // Draw
    if ($expectedResult === 2) {
        $totalScore += 3; // 3 points for draw
        $totalScore += $them; // points for symbol
    }

    // Lose
    if ($expectedResult === 1) {
        switch ($them) {
            case 1:
                $totalScore += 3; // 3 points for scissors
                break;
            case 2:
                $totalScore += 1; // 1 point for rock
                break;
            case 3:
                $totalScore += 2; // 2 points for paper
                break;
        }
    }
}

print $totalScore . PHP_EOL;