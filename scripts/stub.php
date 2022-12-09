<?php

require __DIR__ . '/../vendor/autoload.php';

$input = explode("\n", file_get_contents(__DIR__ . '/input'));

print_r($input);

// eval(\Psy\sh());