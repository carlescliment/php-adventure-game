<?php


require_once __DIR__.'/../vendor/autoload.php'; 

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\RedirectResponse;


$app = new Silex\Application();
$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function(Silex\Application $app, Request $request) { 
    if ($app['session']->has('game')) {
        $command_message = '';
        $game = $app['session']->get('game');
        if ($command = $request->get('command')) {
            $command_message = '<p>' . $game->execute($request->get('command')) . '</p>';        
        }

        $command_message .= '<p>' . $game->execute('look') . '</p>';
        
        return '<form><input class="command" name="command" /><input type="submit" value="Send" /></form>' . $command_message;
    } 
    return '<a href="/app.php/start">Start game</a>';
});

$app->get('/start', function(Silex\Application $app, Request $request) { 
    $game_creator = $app['game_provider'];
    $game = $game_creator->getGame();
    $app['session']->set('game', $game);
    return new RedirectResponse('/');
});


$app->get('/end', function(Silex\Application $app, Request $request) { 
    $app['session']->remove('game');
    return new RedirectResponse('/');
});

return $app;