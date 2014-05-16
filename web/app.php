<?php

$app = require_once('app-build.php');
$app['environment'] = 'prod';
$app['foo'] = 'bar';

$app->run(); 
