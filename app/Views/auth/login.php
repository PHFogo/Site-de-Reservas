<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container" style="max-width: 500px;">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form action="/login" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <p class="text-center mt-3">Não tem uma conta? <a href="/registro">Registre-se</a></p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>