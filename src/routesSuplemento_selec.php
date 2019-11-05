<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/suplemento_selec/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/suplemento_selec/' route");

        if ($_SESSION['login']['ehLogado'] != true) {
            return $response->withRedirect('/login/');
            exit;
        }
        $conexao = $container->get('pdo');
        
        $resultSet = $conexao->query('SELECT * FROM produto')->fetchAll();

        $args['produtos'] = $resultSet;

        // Render index view
        return $container->get('renderer')->render($response, 'suplemento_selec.phtml', $args);
    });

};
