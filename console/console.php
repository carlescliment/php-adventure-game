<?php

require_once __DIR__.'/../vendor/autoload.php';

use DC\AdventureGame\Console\Command\CreateSchemaCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CreateSchemaCommand);
$application->run();