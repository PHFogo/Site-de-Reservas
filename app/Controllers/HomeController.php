<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        // Redireciona para a página de login se não estiver logado
        // ou para a página correta se estiver logado.
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SESSION['user_role'] === 'ADMIN') {
            header('Location: /admin/dashboard');
        } else {
            header('Location: /reservas/status');
        }
        exit;
    }
}