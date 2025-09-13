<?php

namespace App\Models;

use PDO;

class Reserva
{
    private PDO $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function create(int $idUsuario, int $idServico, string $dataReserva): bool
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO reservas (id_usuario, id_servico, data_reserva) VALUES (:id_usuario, :id_servico, :data_reserva)"
        );

        $stmt->bindParam(':id_usuario', $idUsuario);
        $stmt->bindParam(':id_servico', $idServico);
        $stmt->bindParam(':data_reserva', $dataReserva);

        return $stmt->execute();
    }

    public function findByUserId(int $idUsuario): array
    {
        $stmt = $this->conn->prepare(
            "SELECT r.*, s.nome as servico_nome 
             FROM reservas r
             JOIN servicos s ON r.id_servico = s.id
             WHERE r.id_usuario = :id_usuario
             ORDER BY r.data_reserva DESC"
        );
        $stmt->bindParam(':id_usuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllWithDetails(): array
    {
        $stmt = $this->conn->query(
            "SELECT r.*, u.nome as usuario_nome, s.nome as servico_nome 
             FROM reservas r
             JOIN usuarios u ON r.id_usuario = u.id
             JOIN servicos s ON r.id_servico = s.id
             ORDER BY r.data_reserva DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus(int $idReserva, string $status): bool
    {
        $stmt = $this->conn->prepare("UPDATE reservas SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $idReserva);
        return $stmt->execute();
    }
}