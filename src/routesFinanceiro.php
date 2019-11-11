<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/financeiro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/financeiro/' route");

        if ($_SESSION['login']['ehLogado'] != true) {
            
            return $response->withRedirect('/login/');
            exit;
        }
        $conexao = $container->get('pdo');

        $resultSet = $conexao->query('SELECT * FROM usuario WHERE email = "email"')->fetchAll();

        $args['nome'] = $resultSet;
        $args['mensalidade'] = $resultSet;
        // Render index view
        return $container->get('renderer')->render($response, 'financeiro.phtml', $args);
    });

    $app->get('/financeiroSoma/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/financeiro/' route");

        $conexao = $container->get('pdo');

        $totalSoma = 0;

        foreach ($_SESSION['produto'] as $valorTotal) {
        $totalSoma += $valorTotal[0]['preco'];
        }
       
        $args['totalSoma'] = $totalSoma;

        $_SESSION['produto']['valor_total'] = $totalSoma +$_SESSION['login']['mensalidade'] + $_SESSION['precoConsulta'];

        // Render index view
        return $container->get('renderer')->render($response, 'financeiro.phtml', $args);
    });

};
