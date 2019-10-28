<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/criar_conta/[{sucesso}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/inicio/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'criar_conta.phtml', $args);
    });

    $app->post('/criar_conta/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/criar_conta/' route");

        $conexao = $container->get('pdo');

        $params = $request->getParsedBody();

        include_once('dependencies.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $cidade = $_POST['cidade'];
        $numeroCasa = $_POST['numeroCasa'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];
        $sexo = $_POST['sexo'];

        $resultSet = $conexao->query ("INSERT INTO usuario (nome, email, senha, cidade, numeroCasa, cep, complemento, sexo) 
                                    VALUES ('$nome', 
                                            '$email', 
                                            '$senha', 
                                            '$cidade', 
                                            '$numeroCasa', 
                                            '$cep', 
                                            '$complemento', 
                                            '$sexo')");

        return $response->withRedirect('/login/');
    });
};
