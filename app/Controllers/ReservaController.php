<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Reserva;
use App\Models\Servico;

class ReservaController extends Controller
{
    public function __construct()
    {
        // Middleware: Garante que apenas usuários logados acessem
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function status(): void
    {
        $reservaModel = new Reserva($this->getDbConnection());
        $reservas = $reservaModel->findByUserId((int)$_SESSION['user_id']);
        $this->view('reservas/status', ['reservas' => $reservas]);
    }

    public function create(): void
    {
        $servicoModel = new Servico($this->getDbConnection());
        $servicos = $servicoModel->findAll();
        $this->view('reservas/criar', ['servicos' => $servicos]);
    }

    public function store(): void
    {
        $idServico = (int)$_POST['id_servico'];
        $dataReserva = $_POST['data_reserva'];
        $idUsuario = (int)$_SESSION['user_id'];
        
        $reservaModel = new Reserva($this->getDbConnection());
        $reservaModel->create($idUsuario, $idServico, $dataReserva);

        header('Location: /reservas/status');
        exit;
    }
}