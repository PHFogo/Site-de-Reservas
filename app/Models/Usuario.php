<?php

namespace App\Models;

use PDO;

class Usuario
{
    private PDO $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function create(string $nome, string $email, string $senha): bool
    {
        $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare(
            "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)"
        );

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);

        return $stmt->execute();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}