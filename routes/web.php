<?php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\ReservaController;
use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Exceptions\RouteNotFoundException;

$router = new Router();

// Rotas Públicas
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/registro', [AuthController::class, 'showRegistro']);
$router->post('/registro', [AuthController::class, 'registro']);
$router->get('/logout', [AuthController::class, 'logout']);

// Rotas Protegidas para Clientes
$router->get('/reservas/status', [ReservaController::class, 'status']);
$router->get('/reservas/criar', [ReservaController::class, 'create']);
$router->post('/reservas/criar', [ReservaController::class, 'store']);

// Rotas Protegidas para Administrador
$router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$router->post('/admin/reserva/update', [AdminController::class, 'updateStatus']);


try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    http_response_code(404);
    echo "<h1>404 - Página Não Encontrada</h1>";
}