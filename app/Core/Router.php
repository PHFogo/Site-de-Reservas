<?php

namespace App\Core;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function get(string $uri, array $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, array $action): void
    {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch(): void
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            [$controller, $action] = $this->routes[$method][$uri];

            if (class_exists($controller) && method_exists($controller, $action)) {
                $controllerInstance = new $controller();
                $controllerInstance->$action();
            } else {
                throw new \Exception("Controller ou método não encontrado: {$controller}::{$action}");
            }
        } else {
            throw new RouteNotFoundException("Nenhuma rota encontrada para a URI: {$uri}");
        }
    }
}