<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/produto/[{nome}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/produto' route");

        $conexao = $container->get('pdo');
        
        if(!isset($args['nome'])){
            $resultSet = $conexao->query('SELECT * from produto')->fetchAll();
        }

        $resultSet = $conexao->query('SELECT * from produto WHERE nomeProduto = "' . $args['nome'] . '"')->fetchAll();
        
        $args['produto'] = $resultSet;
        

        // Render index view
        return $container->get('renderer')->render($response, 'indexProdutos.phtml', $args);
    });
};