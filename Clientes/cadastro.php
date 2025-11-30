<?php
// Clientes/cadastro.php
session_start();

// Conexão com o banco (assumindo que está na mesma pasta Clientes)
require_once 'conexao.php'; 

$mensagem = "";
$nome = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Receber os dados e manter nas variáveis para não perder se der erro
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // 2. Validações
    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagem = "Preencha todos os campos!";
    } elseif ($senha !== $confirma_senha) {
        $mensagem = "As senhas não coincidem!";
    } else {
        // 3. Verificar duplicidade
        $stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $mensagem = "Este e-mail já está cadastrado!";
        } else {
            // 4. Salvar no Banco
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            try {
                $sql = "INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)";
                $stmt_insert = $pdo->prepare($sql);
                $stmt_insert->execute([$nome, $email, $senha_hash]);

                // --- SUCESSO: Alerta e Tchau ---
                echo "<script>
                    alert('Cadastro realizado com sucesso! Bem-vindo ao Kraken.');
                    window.location.href = 'Pagina-Principal.php';
                </script>";
                exit; // OBRIGATÓRIO: Para o script aqui para evitar resenvio

            } catch (PDOException $e) {
                $mensagem = "Erro técnico: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Kraken Launcher</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #222; color: #fff; margin:0; }
        .form-container { background: #333; padding: 2rem; border-radius: 8px; width: 300px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; margin-top: 10px; }
        button:hover { background: #0056b3; }
        .aviso { background-color: #ff6b6b; color: white; padding: 10px; border-radius: 4px; text-align: center; margin-bottom: 15px; font-size: 0.9em; }
        label { color: #ccc; font-size: 0.9rem; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 style="text-align:center; margin-top:0;">Criar Conta</h2>
        
        <?php if(!empty($mensagem)): ?>
            <div class="aviso"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>" required placeholder="Seu nome de usuário">

            <label>E-mail:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required placeholder="seu@email.com">

            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="********">

            <label>Confirmar Senha:</label>
            <input type="password" name="confirma_senha" required placeholder="********">

            <button type="submit">Cadastrar</button>
        </form>
        
        <p style="text-align:center; margin-top:20px; font-size:0.8rem;">
            Já tem conta? <a href="login.php" style="color:#4da3ff; text-decoration: none;">Entrar</a>
        </p>
    </div>

</body>
</html>