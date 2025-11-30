<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kraken Launcher</title>
  <link rel="stylesheet" href="style.css" />
</head>

<div class="header-container">
    <div class="logo-title">
        <img src="https://i.postimg.cc/Jsj8CJqd/OIG2.jpg" alt="Logo Kraken" class="logo" />
        <h1>Kraken Launcher</h1>
    </div>

    <nav>
        <ul>
            <li><a href="?pg=Pagina-Principal">Início</a></li>
            <li><a href="?pg=Biblioteca">Biblioteca</a></li>
            <li><a href="../Admin/Index-Admin.php"></a></li>
        </ul>
    </nav>

    <div class="user-area">
        <?php if(isset($_SESSION['nome'])): ?>
            <span style="color:white; margin-right:10px;">Olá, <strong><?php echo $_SESSION['nome']; ?></strong></span>
            <a href="logout.php" class="btn-login" style="background-color: #dc3545;">Sair</a>
        <?php else: ?>
            <a href="cadastro.php" class="btn-login">Criar Conta / Entrar</a>
        <?php endif; ?>
    </div>
</div>