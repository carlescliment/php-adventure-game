<?php


require_once __DIR__.'/../vendor/autoload.php'; 

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app->get('/', function(Silex\Application $app, Request $request) { 
    $command = $request->get('command');
    $output = $app['game']->execute($command);
    return '<html><body>'.$output.'</body></html>'; 
}); 

return $app;