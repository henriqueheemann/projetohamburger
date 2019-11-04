<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/suplemento/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/suplemento/' route");


        $conexao= $container->get('pdo');

        $resultSet = $conexao->query('SELECT * FROM produto')->fetchAll();

        $args['produtos'] = $resultSet;
        


        // Render index view
        return $container->get('renderer')->render($response, 'suplemento.phtml', $args);
    });

    $app->get('/suplemento/[{idproduto}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/suplemento_selec/' route");

        $conexao = $container->get('pdo');

        $contemProduto = false;
        foreach ($_SESSION['selec'] as $produtoCarrinho) {
            if ($produtoCarrinho[0]['idproduto'] == $args['idproduto']) {
                $contemProduto = true;
            }
        }

        // idProduto nao está na variável de session
        if (!$contemProduto) {
            $resultSet = $conexao->query('SELECT * FROM produto WHERE idproduto = ' . $args['idproduto'])->fetchAll();
            //fazer select no banco para o resultset
            $_SESSION['selec'][] = $resultSet;
        }


        return $container->get('renderer')->render($response, 'suplemento_selec.phtml', $args);
    });

};



