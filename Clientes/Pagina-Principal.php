<?php 

  require "Banco.php";

  $sql = "SELECT * FROM jogos";
  $resultado = mysqli_query($conexao, $sql);

?>

<main id="inicio" class="game-list">

<?php 

while($dados = mysqli_fetch_array($resultado))
  {
    echo '
    <article class="game-card">
      <img src="' . $dados ['imagem'] . '" alt="' . $dados ['nome'] . '" />
      <h2>' . $dados ['nome'] . '</h2>
      <a href="' . $dados ['nome'] . '" target="_blank">Ver na Steam</a>
      <button class="favorito-btn">Favoritar</button>
    </article>';
  }

?>
  
</main>
