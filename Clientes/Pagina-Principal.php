<main id="inicio" class="game-list">

<?php 
    // Arquivo que estabelece a conexão com o banco de dados
    require "Banco.php";

    // --- LÓGICA DE ALTERAÇÃO DE STATUS (Toggle) ---
    // Esta seção processa o clique em "Favoritar" e altera o status no banco de dados.
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        
        $id_game = $_GET['id'];

        // SQL seguro para alternar o valor do 'estatus' entre 'true' e 'false'
        // Se o estatus for 'true', ele vira 'false'. Se for 'false', vira 'true'.
        $sql_update = "UPDATE jogos SET estatus = CASE 
                        WHEN estatus = 'true' THEN 'false' 
                        ELSE 'true' 
                      END 
                      WHERE id = ?";

        // Usa Prepared Statement para evitar Injeção de SQL
        if ($stmt = mysqli_prepare($conexao, $sql_update)) {
            mysqli_stmt_bind_param($stmt, "i", $id_game); 
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // IMPORTANTE: Redirecionamento via JavaScript para limpar a URL
            // Isso impede que o status seja alternado duas vezes em um refresh.
            // O código redireciona para a própria Página Principal
            echo "<script>window.location.href='?pg=Pagina-Principal';</script>";
            exit(); 
        }
    }

    // --- LÓGICA DE EXIBIÇÃO ---
    // Seleciona apenas os jogos que NÃO ESTÃO na biblioteca (estatus = 'false')
    $sql_select = "SELECT * FROM jogos WHERE estatus = 'false'";
    $resultado = mysqli_query($conexao, $sql_select);
?>

<?php 
    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            // Sanitização da saída
            $nome = htmlspecialchars($dados['nome']);
            $imagem = htmlspecialchars($dados['imagem']);
            $id = $dados['id'];

            echo '
            <article class="game-card">
                <img src="' . $imagem . '" alt="' . $nome . '" />
                <h2>' . $nome . '</h2>
                <div class="card-actions">
                    <a href="' . $nome . '" target="_blank" class="btn-steam">Ver na Steam</a>
                    <!-- O link envia o ID para a própria Página Principal para ser processado (Favoritar) -->
                    <a class="favorito-btn" href="?pg=Biblioteca&id=' . $id . '">Favoritar</a>
                </div>
            </article>';
        }
    } else {
        echo '<p>Todos os jogos já foram adicionados à sua biblioteca!</p>';
    }
?>
  
</main>