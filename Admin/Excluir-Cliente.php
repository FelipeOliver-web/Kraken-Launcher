<?php
session_start();
require_once '../Clientes/conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Deleta o cliente pelo ID
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Volta para a lista
        header("Location: Gerenciar-Clientes.php");
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {
    header("Location: Gerenciar-Clientes.php");
}
?>