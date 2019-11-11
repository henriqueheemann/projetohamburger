<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/agendar_consulta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/agendar_consulta/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'agendar_consulta.phtml', $args);
    });

    $app->post('/agendar_consulta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sampley log message
        $container->get('logger')->info("Slim-Skeleton '/agendar_consulta/' route");

        $conexao = $container->get('pdo');

        $consulta = $_POST;

        $dia = $_POST['agenda'];
        $nomeNutri = $_POST['nomeNutri'];
        $preco = $_POST['preco'];

        $resultSet = $conexao->query('INSERT INTO nutricionista (dia, nomeNutri, preco) VALUES (DATE_FORMAT(STR_TO_DATE("'.$dia.'", "%d/%m/%Y"), "%Y/%m/%d"), "'.$nomeNutri.'", "'.$preco.'")');


        return $response->withRedirect('/login/');
    });
};
