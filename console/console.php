<?php

require_once __DIR__.'/../vendor/autoload.php';

use DC\AdventureGame\Console\Command\CreateSchemaCommand;
use Symfony\Component\Console\Application;

$silex = require_once __DIR__.'/../web/app-build.php';
$application = new Application();
$application->add(new CreateSchemaCommand($silex));
$application->run();