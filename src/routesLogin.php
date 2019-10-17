<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/login/[{sucesso}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/login/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'login.phtml', $args);
    });

    $app->post('/login/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/login/' route");

        $conexao = $container->get('pdo');

        $params = $request->getParsedBody();

        $resultSet = $conexao->query('SELECT * FROM usuario 
                                      WHERE email = "' . $params['email'] . '" 
                                            AND senha = "' . md5($params['senha']) . '"')->fetchAll();

        if (count($resultSet) == 1) {
            $_SESSION['login']['ehLogado'] = true;
            $_SESSION['login']['nome'] = $resultSet['nome'];
            
<<<<<<< Updated upstream
            return $response->withRedirect('/indexProdutos');
=======
            return $response->withRedirect('/');
>>>>>>> Stashed changes
        } else {
            $_SESSION['login']['ehLogado'] = false;

            return $response->withRedirect('/login/fail');
        }

        // Render index view
        return $container->get('renderer')->render($response, 'login.phtml', $args);
    });
};
