<?php
session_start();
require_once '../Clientes/conexao.php'; // Volta uma pasta para achar a conexão

$mensagem = "";
$tipo_msg = ""; // Para definir cor (erro ou sucesso)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagem = "Preencha todos os campos!";
        $tipo_msg = "erro";
    } else {
        // 1. Verifica se e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $mensagem = "Este e-mail já está cadastrado!";
            $tipo_msg = "erro";
        } else {
            // 2. Criptografa a senha
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            // 3. Salva no Banco
            try {
                $sql = "INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome, $email, $senha_hash]);

                // Redireciona para a lista após sucesso
                echo "<script>
                        alert('Cliente cadastrado com sucesso!');
                        window.location.href = 'Gerenciar-Clientes.php';
                      </script>";
                exit;

            } catch (PDOException $e) {
                $mensagem = "Erro no banco: " . $e->getMessage();
                $tipo_msg = "erro";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente - Kraken Launcher</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo Dark/Roxo Específico para o Formulário */
        body {
            background-color: #0a0a0a;
            color: #e0e0ff;
            font-family: Arial, sans-serif;
        }

        .container-form {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background-color: #111;
            border: 2px solid #a020f0;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(160, 32, 240, 0.3);
        }

        h2 {
            text-align: center;
            color: #a020f0;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #b57aff;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #1a1a1a;
            border: 1px solid #555;
            color: white;
            border-radius: 5px;
            box-sizing: border-box; /* Importante para não estourar a largura */
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #a020f0;
            box-shadow: 0 0 8px rgba(160, 32, 240, 0.5);
        }

        .btn-salvar {
            width: 100%;
            padding: 12px;
            background-color: #a020f0;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
        }

        .btn-salvar:hover {
            background-color: #c64aff;
            box-shadow: 0 0 15px #a020f0;
        }

        .btn-voltar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #888;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-voltar:hover {
            color: white;
        }

        .msg-erro {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            padding: 10px;
            border: 1px solid #dc3545;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <?php include 'Header-Admin.php'; ?>

    <div class="container-form">
        <h2>Novo Cliente</h2>

        <?php if(!empty($mensagem)): ?>
            <div class="msg-erro"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Nome do Usuário:</label>
            <input type="text" name="nome" required placeholder="Ex: MasterChief" autocomplete="off">

            <label>E-mail:</label>
            <input type="email" name="email" required placeholder="usuario@email.com" autocomplete="off">

            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="********" autocomplete="new-password">

            <button type="submit" class="btn-salvar">Cadastrar</button>
        </form>

        <a href="Gerenciar-Clientes.php" class="btn-voltar">&larr; Voltar para a Lista</a>
    </div>

</body>
</html>