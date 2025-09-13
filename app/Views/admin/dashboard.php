<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <h2>Dashboard do Administrador</h2>
    <p>Gerenciamento de todas as reservas do sistema.</p>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Data da Reserva</th>
                <th>Status Atual</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?= htmlspecialchars($reserva['usuario_nome']) ?></td>
                    <td><?= htmlspecialchars($reserva['servico_nome']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($reserva['data_reserva'])) ?></td>
                    <td><?= htmlspecialchars($reserva['status']) ?></td>
                    <td>
                        <form action="/admin/reserva/update" method="POST" class="d-flex">
                            <input type="hidden" name="id_reserva" value="<?= $reserva['id'] ?>">
                            <select name="status" class="form-select form-select-sm me-2">
                                <option value="PENDENTE" <?= $reserva['status'] == 'PENDENTE' ? 'selected' : '' ?>>Pendente</option>
                                <option value="CONFIRMADA" <?= $reserva['status'] == 'CONFIRMADA' ? 'selected' : '' ?>>Confirmada</option>
                                <option value="CANCELADA" <?= $reserva['status'] == 'CANCELADA' ? 'selected' : '' ?>>Cancelada</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>