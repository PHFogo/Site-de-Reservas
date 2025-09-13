<?php

// Defina a senha que você quer usar
$senhaPlana = 'admin123';

// Gera o hash usando o algoritmo padrão e mais seguro
$hash = password_hash($senhaPlana, PASSWORD_DEFAULT);

echo "<h1>Hash Gerado</h1>";
echo "<p>Copie o texto abaixo e cole no campo 'senha' do seu banco de dados para o usuário admin.</p>";
echo "<hr>";
echo "<strong style='font-family: monospace; font-size: 1.2rem;'>" . $hash . "</strong>";

?>