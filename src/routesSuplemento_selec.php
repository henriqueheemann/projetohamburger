<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/suplemento_selec/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/suplemento_selec/' route");

<<<<<<< HEAD
        if ($_SESSION['login']['ehLogado'] != true) {
            return $response->withRedirect('/login/');
            exit;
        }
        
=======


        $conexao = $container->get('pdo');
        

        $resultSet = $conexao->query('SELECT * FROM produto')->fetchAll();

        $args['produtos'] = $resultSet;


>>>>>>> 4859727a26e0b13fcf90a0406d2225dd0285297e
        // Render index view
        return $container->get('renderer')->render($response, 'suplemento_selec.phtml', $args);
    });

};
