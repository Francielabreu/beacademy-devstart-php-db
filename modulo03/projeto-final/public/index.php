<?php
ini_set('display_errors',1);

include '../vendor/autoload.php';
use App\Connection\Connection;


use App\Controller\ErrorController;
//Connection::getConnection();

/*

$query = 'SELECT * FROM tb_category;';
$preparacao = $connection->prepare($query);
$preparacao->execute();



while ($dados = $preparacao->fetch()) {
    var_dump($dados);
}
*/


$url = explode('?' , $_SERVER['REQUEST_URI'])[0];
$routes = include '../config/routes.php';





if (false ===isset($routes[$url])){
    (new ErrorController())->notFoundAction();
    exit;
}

$controllerName = $routes[$url] ['controller'];
$methodName = $routes[$url] ['method'];

(new $controllerName())-> $methodName();








