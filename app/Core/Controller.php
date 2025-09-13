<?php

namespace App\Core;

use Config\Database;
use PDO;

abstract class Controller
{
    private ?PDO $db = null;

    protected function getDbConnection(): PDO
    {
        if ($this->db === null) {
            $this->db = Database::getConnection();
        }
        return $this->db;
    }

    protected function view(string $viewName, array $data = []): void
    {
        extract($data);
        $filePath = __DIR__ . "/../Views/{$viewName}.php";
        if (file_exists($filePath)) {
            require $filePath;
        } else {
            throw new \Exception("View não encontrada: {$filePath}");
        }
    }
}