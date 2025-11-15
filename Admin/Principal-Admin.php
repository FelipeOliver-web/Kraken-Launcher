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
                <a href="?pg=Form-Editar-Jogos&id='.$dados['id'].'">Editar</a>
                <a class="" href="?pg=Excluir-Jogos&id='.$dados['id'].'">Excluir</a>
                <img src="' . $dados ['imagem'] . '">
            </article>';
    }
?>

</main>
</body>