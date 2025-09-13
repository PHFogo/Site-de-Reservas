<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Minhas Reservas</h2>
        <a href="/reservas/criar" class="btn btn-primary">Fazer Nova Reserva</a>
    </div>
    
    <?php if (empty($reservas)): ?>
        <p class="alert alert-info">Você ainda não fez nenhuma reserva.</p>
    <?php else: ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Serviço</th>
                    <th>Data da Reserva</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                    <tr>
                        <td><?= htmlspecialchars($reserva['servico_nome']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($reserva['data_reserva'])) ?></td>
                        <td>
                            <span class="badge 
                                <?php 
                                    switch ($reserva['status']) {
                                        case 'CONFIRMADA': echo 'bg-success'; break;
                                        case 'CANCELADA': echo 'bg-danger'; break;
                                        default: echo 'bg-warning text-dark';
                                    }
                                ?>">
                                <?= htmlspecialchars($reserva['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>