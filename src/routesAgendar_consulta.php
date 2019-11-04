<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/agendar_consulta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/agendar_consulta/' route");

        if ($_SESSION['login']['ehLogado'] != true) {
            return $response->withRedirect('/login/');
            exit;
        }

        // Render index view
        return $container->get('renderer')->render($response, 'agendar_consulta.phtml', $args);
    });

    $app->post('/agendar_consulta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/agendar_consulta/' route");

        $conexao = $container->get('pdo');

        $params = $request->getParsedBody();


        $resultSet = $conexao->query('SELECT * FROM nutricionista WHERE dia = "' . $params['agenda'] . '" 
                                        AND nutricionista = "' . ($params['nutricionista']) . '"')->fetchAll();
    });
};
