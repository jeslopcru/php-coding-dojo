<?php

use Symfony\Component\Console\Application;

require __DIR__ . '/../../../vendor/autoload.php';

$application = new Application('kata', '0.1.0-dev');
$application->add(new \LeanCodeKataProject\ConsoleApp());
$application->run();
