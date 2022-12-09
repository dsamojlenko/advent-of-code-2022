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
    $day = readline("Day: ");
    $day = sprintf("%02d", $day);
    
    $output = shell_exec("php " . __DIR__ . "/../day$day/index.php");

    echo $output;
}