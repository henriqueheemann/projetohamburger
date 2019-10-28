<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/financeiro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/financeiro/' route");
        
        $conexao = $container->get('pdo');

        $resultSet = $conexao->query('SELECT * FROM inicio')->fetchAll();

        $args['nome_usuario'] = $resultSet;

        // Render index view
        return $container->get('renderer')->render($response, 'financeiro.phtml', $args);
    });

};
