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

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $cidade = $_POST['cidade'];
        $numeroCasa = $_POST['numeroCasa'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        $mensalidade = $_POST['mensalidade'];

        $resultSet = $conexao->query('SELECT nome FROM usuario WHERE nome = "' . $params['nome'] . '"')->fetchAll();
        
        if ($params['nome'] == null || 
            $params['email'] == null || 
            $params['senha'] == null || 
            $params['confirmarSenha'] == null || 
            $params['cidade'] == null || 
            $params['numeroCasa'] == null || 
            $params['cep'] == null || 
            $params['complemento'] == null || 
            $params['idade'] == null || 
            $params['sexo'] == null || 
            $params['mensalidade'] == null || 
            $params['nome'] == null ) {
            return $response->withRedirect('/criar_conta/blank-fields');
        } 
        
        else if ($resultSet != null) {
            return $response->withRedirect('/criar_conta/user-already-exists');
        }

        else if ($params['senha'] != $params['confirmarSenha']) {
            return $response->withRedirect('/criar_conta/passwords-not-equal');
        }

        else if (filter_var($params['email'], FILTER_VALIDATE_EMAIL) == false){
            return $response->withRedirect('/criar_conta/email-not-valid');
        }
        
        $resultSet = $conexao->query ("INSERT INTO usuario (nome, email, senha, cidade, numeroCasa, cep, complemento, idade, sexo, mensalidade) 
                                       VALUES ('$nome', 
                                               '$email', 
                                               '$senha', 
                                               '$cidade', 
                                               '$numeroCasa', 
                                               '$cep', 
                                               '$complemento', 
                                               '$idade',
                                               '$sexo',
                                               '$mensalidade')");
                                            
        return $response->withRedirect('/login/');
    });
};
