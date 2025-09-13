<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Reserva;
use App\Enums\UserRole;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware de Autenticação e Autorização para Admin
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== UserRole::ADMIN->value) {
            http_response_code(403);
            die('Acesso negado.');
        }
    }

    public function dashboard(): void
    {
        $reservaModel = new Reserva($this->getDbConnection());
        $reservas = $reservaModel->findAllWithDetails();
        $this->view('admin/dashboard', ['reservas' => $reservas]);
    }

    public function updateStatus(): void
    {
        $reservaId = (int)$_POST['id_reserva'];
        $novoStatus = $_POST['status'];

        $reservaModel = new Reserva($this->getDbConnection());
        $reservaModel->updateStatus($reservaId, $novoStatus);

        header('Location: /admin/dashboard');
        exit;
    }
}