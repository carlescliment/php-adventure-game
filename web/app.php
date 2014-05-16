<?php

use DC\AdventureWeb\GameProvider;

$app = require_once('app-build.php');
$app['environment'] = 'prod';
$app['debug'] = true;
$app['exception_handler']->disable();
$app['game_provider'] = new GameProvider();

$app->run(); 
