<?php

require_once '../vendor/autoload.php';

use App\Core\Router;

// Verifica o controlador e a ação enviados via GET
$controllerName = $_GET['controller'] ?? 'HomeController';
$actionName = $_GET['action'] ?? 'index';

// Roteia para o controlador e a ação, passando os argumentos automaticamente
Router::route($controllerName, $actionName);
