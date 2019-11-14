<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/meta_selec/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/meta_selec/' route");

        if ($_SESSION['login']['ehLogado'] != true) {
            return $response->withRedirect('/login/');
            exit;
        }
        
        $conexao = $container->get('pdo');

        $resultSet = $conexao->query('SELECT * FROM meta')->fetchAll();

        $args['descricoes'] = $resultSet;

        // Render index view
        return $container->get('renderer')->render($response, 'meta_selec.phtml', $args);
    });

};
