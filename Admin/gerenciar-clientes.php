<?php
session_start();
require_once '../Clientes/conexao.php';; // Pega a conexão

// Busca todos os clientes
$sql = "SELECT * FROM clientes ORDER BY id DESC";
$stmt = $pdo->query($sql);
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Clientes - Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS Específico para a lista de clientes ficar igual ao tema */
        .container-admin { max-width: 1000px; margin: 50px auto; padding: 20px; }
        
        .header-actions { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .titulo-pag { color: #a020f0; margin: 0; font-size: 2rem; }
        
        /* Tabela Estilizada Dark */
        .tabela-users { width: 100%; border-collapse: collapse; background: #111; border-radius: 10px; overflow: hidden; border: 1px solid #a020f0; }
        .tabela-users th, .tabela-users td { padding: 15px; text-align: left; color: #ddd; border-bottom: 1px solid #333; }
        .tabela-users th { background-color: #1a1a1a; color: #a020f0; font-weight: bold; text-transform: uppercase; font-size: 0.9rem; }
        .tabela-users tr:hover { background-color: #222; }
        
        /* Botão de Excluir */
        .btn-excluir { 
            background-color: #dc3545; color: white; padding: 8px 15px; 
            text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 0.9rem; transition: 0.3s;
        }
        .btn-excluir:hover { background-color: #b02a37; }
        
        /* Botão Adicionar (caso queira criar manual) */
        .btn-add {
            background-color: #333; color: #fff; padding: 10px 20px;
            border: 1px solid #a020f0; text-decoration: none; border-radius: 5px; transition: 0.3s;
        }
        .btn-add:hover { background-color: #a020f0; }
    </style>
</head>
<body>

    <?php include 'Header-Admin.php'; ?>

    <div class="container-admin">
        
        <div class="header-actions">
            <h2 class="titulo-pag">Lista de Clientes</h2>
            <a href="Form-Adicionar-Usuario.php" class="btn-add">+ Adicionar Cliente</a>
        </div>

        <table class="tabela-users">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th style="text-align:center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($clientes) > 0): ?>
                    <?php foreach($clientes as $cliente): ?>
                    <tr>
                        <td>#<?php echo $cliente['id']; ?></td>
                        <td><strong><?php echo $cliente['nome']; ?></strong></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td style="text-align:center;">
                            <a href="Excluir-Cliente.php?id=<?php echo $cliente['id']; ?>" 
                               class="btn-excluir"
                               onclick="return confirm('Tem certeza que deseja banir o usuário <?php echo $cliente['nome']; ?>?');">
                               Excluir
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 30px;">Nenhum cliente cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>