<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/criar_conta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/criar_conta/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'criar_conta.phtml', $args);
    });

};
