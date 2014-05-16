<?php

$app = require_once('app-build.php');
$app['environment'] = 'prod';
$app['foo'] = 'bar';

$player = new DC\AdventureGame\Player(new DC\AdventureGame\Position([], 'Some description'));
$app['game'] = DC\AdventureGame\Factory\ApplicationFactory::createDefault($player);

$app->run(); 





/*
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'php_adventure_game_'.$app['environment'],
        'user'      => 'dbuser',
        'password'  => '123',
        'charset'   => 'utf8',
    ),
)); 
*/
