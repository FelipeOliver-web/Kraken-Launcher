<div class="footer-buttons">
    <button><a href="?pg=Form-Adicionar-Jogos" >Adicionar jogo</a></button>
</div>

<?php 

    require "Banco-Admin.php";

    $sql = "SELECT * FROM jogos";
    $resultado = mysqli_query($conexao, $sql);

    echo '<main id="inicio" class="game-list">
    <article class="game-card">';

    while($dados = mysqli_fetch_array($resultado))
    {
        echo '    

            <img src="' . $dados ['imagem'] . '" alt="' . $dados ['nome'] . '" />
            <h2>' . $dados ['nome'] . '</h2>
            <a href="' . $dados ['link'] . '" target="_blank">Ver na Steam</a>
            <button class="favorito-btn">Favoritar</button>;
            <button class="favorito-btn">Editar</button>;
            <button class="favorito-btn">Excluir</button>';
    }
  echo '</article>

        </main>';
?>

</body>
</html>