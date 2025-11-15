<?php
    require_once 'Banco-Admin.php';

    $id = $_POST['id'];
    $imagem = $_POST['imagem'];
    $nome = $_POST['nome'];
    $link = $_POST['link'];

    $sql = "UPDATE jogos SET imagem = '$imagem',
            nome = '$nome',
            link = '$link'
            WHERE id = '$id'";


    if($resultado = mysqli_query($conexao, $sql)){
        echo "<br><h2>Jogo alterado com sucesso!";
        echo "<a href='?pg=Principal-Admin'>Voltar</a>";
    }else{
        echo "<br><h3>Erro ao alterar o jogo</h3>";
        echo "<a href='?pg=Principal-Admin'>Voltar</a>";
    }