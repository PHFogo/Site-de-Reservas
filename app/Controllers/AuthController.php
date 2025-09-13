<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login');
    }

    public function login(): void
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $userModel = new Usuario($this->getDbConnection());
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_role'] = $user['role'];
            header('Location: /');
            exit;
        }

        // Se o login falhar, redireciona de volta com uma mensagem de erro
        $_SESSION['error'] = "E-mail ou senha inválidos.";
        header('Location: /login');
        exit;
    }

    public function showRegistro(): void
    {
        $this->view('auth/registro');
    }

    public function registro(): void
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // Validações simples (poderiam ser mais robustas)
        if (empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['error'] = "Todos os campos são obrigatórios.";
            header('Location: /registro');
            exit;
        }

        $userModel = new Usuario($this->getDbConnection());
        if ($userModel->findByEmail($email)) {
             $_SESSION['error'] = "Este e-mail já está em uso.";
             header('Location: /registro');
             exit;
        }

        if ($userModel->create($nome, $email, $senha)) {
            header('Location: /login');
            exit;
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao criar a conta.";
            header('Location: /registro');
            exit;
        }
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}