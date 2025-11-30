<?php
// Clientes/logout.php
session_start(); // 1. Encontra a sessão atual

// 2. Destroi todas as variáveis e a sessão
session_unset();
session_destroy();

// 3. Manda o usuário de volta para a página inicial (deslogado)
header("Location: index.php");
exit;
?>