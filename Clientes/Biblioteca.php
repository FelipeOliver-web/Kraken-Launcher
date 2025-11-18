  <section class="library-section">
    <h2 class="section-title">Minha Biblioteca</h2>
    <ul id="libraryList" class="library">
    </ul>

<?php 

  require "Banco.php";

    $estatus = $_GET['estatus'];
    $id = $_GET['id'];

    $sql = "UPDATE jogos SET estatus = 'true', WHERE id = '$id'";

?>

<?php

  $sql = "SELECT * FROM jogos where estatus = 'true'";
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
    </article>';
  }

?>
  
</main>

  </section>