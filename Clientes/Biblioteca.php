<section class="library-section">
    <h2 class="section-title">Minha Biblioteca</h2>
    
    <?php if(isset($_GET['msg'])): ?>
        <p style="color: green; text-align: center;">Biblioteca atualizada!</p>
    <?php endif; ?>

    <ul id="libraryList" class="library"></ul>

<?php 
    require "Banco.php";

    // --- LÓGICA DE ALTERAÇÃO DE STATUS (Toggle) ---
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        
        $id_game = $_GET['id'];

        // SQL para alternar o valor do 'estatus'
        $sql_update = "UPDATE jogos SET estatus = CASE 
                        WHEN estatus = 'true' THEN 'false' 
                        ELSE 'true' 
                      END 
                      WHERE id = ?";

        if ($stmt = mysqli_prepare($conexao, $sql_update)) {
            mysqli_stmt_bind_param($stmt, "i", $id_game); 
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Redirecionamento via JavaScript para limpar a URL
            header("Location: ?pg=Biblioteca&msg=ok");
            exit(); 
        }
    }

    // --- LÓGICA DE EXIBIÇÃO ---
    $sql_select = "SELECT * FROM jogos WHERE estatus = 'true'";
    $resultado = mysqli_query($conexao, $sql_select);
?>

<main id="inicio" class="game-list">

<?php 
    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            $nome = htmlspecialchars($dados['nome']);
            $imagem = htmlspecialchars($dados['imagem']);
            $id = $dados['id']; 

            echo '
            <article class="game-card">
                <img src="' . $imagem . '" alt="' . $nome . '" />
                <h2>' . $nome . '</h2>
                <div class="card-actions">
                    <a href="?pg=Pagina-Principal&id=' . $id . '" class="btn-remove">Remover</a>
                    <a href="' . $nome . '" target="_blank" class="btn-steam">Ver na Steam</a>
                </div>
            </article>';
        }
    } else {
        echo '';
    }
?>
  
</main>

</section>
