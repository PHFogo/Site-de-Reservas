<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container" style="max-width: 600px;">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Fazer uma Reserva</h2>
            <form action="/reservas/criar" method="POST">
                <div class="mb-3">
                    <label for="id_servico" class="form-label">Selecione o Serviço</label>
                    <select class="form-select" id="id_servico" name="id_servico" required>
                        <option value="" disabled selected>-- Escolha um serviço --</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?= $servico['id'] ?>">
                                <?= htmlspecialchars($servico['nome']) ?> (R$ <?= number_format($servico['preco'], 2, ',', '.') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="data_reserva" class="form-label">Data e Hora</label>
                    <input type="datetime-local" class="form-control" id="data_reserva" name="data_reserva" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>