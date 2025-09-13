<?php

declare(strict_types=1);

// Inicia a sessão para controle de login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ADICIONADO PARA VER O ERRO REAL
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Carrega o autoloader do Composer
require_once __DIR__ . '/../vendor/autoload.php';

/*
// Tratamento de Exceções Global (TEMPORARIAMENTE DESATIVADO)
set_exception_handler(function ($exception) {
    // Em um ambiente de produção, você logaria o erro em um arquivo
    // error_log($exception->getMessage());
    http_response_code(500);
    // Exibe uma view de erro genérica
    require __DIR__ . '/../app/Views/layouts/error.php';
});
*/

// Carrega as variáveis de ambiente do arquivo .env
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    die("Erro: O arquivo .env não foi encontrado. Por favor, crie um a partir do .env.example.");
}

require_once __DIR__ . '/../routes/web.php';
