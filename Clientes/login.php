<?php
// Clientes/login.php
session_start();
require_once 'conexao.php';

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        $erro = "Preencha e-mail e senha!";
    } else {
        // 1. Busca o usuário pelo e-mail
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        // 2. Verifica se o usuário existe E se a senha bate
        // O password_verify compara a senha digitada com a criptografia do banco
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            
            // 3. Login Sucesso: Cria a sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redireciona para a página principal
            header("Location: Pagina-Principal.php");
            exit;
        } else {
            $erro = "E-mail ou senha incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Kraken Launcher</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #222; color: #fff; margin:0; }
        .form-container { background: #333; padding: 2rem; border-radius: 8px; width: 300px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; margin-top: 10px; }
        button:hover { background: #218838; }
        .aviso-erro { background-color: #ff6b6b; color: white; padding: 10px; border-radius: 4px; text-align: center; margin-bottom: 15px; font-size: 0.9em; }
        label { color: #ccc; font-size: 0.9rem; }
        h2 { text-align:center; margin-top:0; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Entrar no Kraken</h2>
        
        <?php if(!empty($erro)): ?>
            <div class="aviso-erro"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>E-mail:</label>
            <input type="email" name="email" required placeholder="seu@email.com">

            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="********">

            <button type="submit">Entrar</button>
        </form>
        
        <p style="text-align:center; margin-top:20px; font-size:0.8rem;">
            Ainda não tem conta? <a href="cadastro.php" style="color:#4da3ff; text-decoration: none;">Cadastre-se</a>
        </p>
    </div>

</body>
</html>