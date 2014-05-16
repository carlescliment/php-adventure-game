<?php

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'php_adventure_game',
        'user'      => 'dbuser',
        'password'  => '123',
        'charset'   => 'utf8',
    ),
)); 

$app->get('/', function() { 
    return 'Hello!'; 
}); 

return $app;