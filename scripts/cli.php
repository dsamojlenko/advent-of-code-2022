<?php

if ($argv[1] === 'new') {
    $day = readline("Day: ");
    $day = sprintf("%02d", $day);

    if (is_dir(__DIR__ . "/../day$day")) {
        die("Day $day already exists" . PHP_EOL);
    }

    mkdir(__DIR__ . "/../day$day");
    touch(__DIR__ . "/../day$day/index.php");
    touch(__DIR__ . "/../day$day/input");
    touch(__DIR__ . "/../day$day/test");

    $php = file_get_contents(__DIR__ . "/stub.php");
    file_put_contents(__DIR__ . "/../day$day/index.php", $php);

    print "Huzzah! Day $day is ready to go!" . PHP_EOL;
}

if ($argv[1] === 'run') {
    if (isset($argv[2])) {
        $day = $argv[2];
    }

    if (!isset($day)) {
        $day = readline("Day: ");
    }

    if (!is_numeric($day)) {
        die("Day must be a number" . PHP_EOL);
    }

    $day = sprintf("%02d", $day);

    if (!is_dir(__DIR__ . "/../day$day")) {
        die("Day $day does not exist" . PHP_EOL);
    }
    
    $output = shell_exec("php " . __DIR__ . "/../day$day/index.php");

    echo $output;
}