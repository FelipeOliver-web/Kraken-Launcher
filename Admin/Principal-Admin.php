<div class="footer-buttons">
    <button><a href="?pg=Form-Adicionar-Jogos" >Adicionar jogo</a></button>
</div>

<?php 
    require "Banco-Admin.php";

    $sql = "SELECT * FROM jogos";
    $resultado = mysqli_query($conexao, $sql);
?>

<main id="inicio" class="game-list">   

<?php
    while($dados = mysqli_fetch_array($resultado))
    {
        echo '
            <article class="game-card">
                <h2>' . $dados ['nome'] . '</h2>
                <a href="' . $dados ['link'] . '" target="_blank">Ver na Steam</a>
                <button class="favorito-btn">Editar</button>
                <button class="excluir-btn">Excluir</button>
                <img src="' . $dados ['imagem'] . '">
            </article>';
    }
?>

</main>
</body>