<?php

namespace App\Core;

class Router
{
    public static function route($controllerName, $actionName)
    {
        $controllerClass = "App\\Controllers\\$controllerName";

        if (!class_exists($controllerClass)) {
            die("Controlador $controllerName não encontrado.");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $actionName)) {
            die("Método $actionName não encontrado no controlador $controllerName.");
        }

        // Captura os parâmetros do request
        $params = array_merge($_GET, $_POST);

        // Identifica os argumentos esperados pelo método
        $reflection = new \ReflectionMethod($controller, $actionName);
        $requiredParams = $reflection->getParameters();
        $args = [];

        foreach ($requiredParams as $param) {
            $name = $param->getName();
            if (isset($params[$name])) {
                $args[] = $params[$name];
            } elseif ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();
            } else {
                die("Parâmetro obrigatório '{$name}' não foi fornecido.");
            }
        }

        // Executa o método com os argumentos
        call_user_func_array([$controller, $actionName], $args);
    }
}
