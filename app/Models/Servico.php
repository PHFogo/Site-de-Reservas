<?php

namespace App\Models;

use PDO;

class Servico
{
    private PDO $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function findAll(): array
    {
        $stmt = $this->conn->query("SELECT * FROM servicos ORDER BY nome ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}