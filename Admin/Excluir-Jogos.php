<?php

    require_once 'Banco-Admin.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM jogos WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<br><h2>Jogo Excluído com sucesso.</h2>";
        echo "<a href='?pg=Principal-Admin'>Voltar</a>";
    }else{
        echo "<br><h2>Erro ao excluir o Jogo.</h2>";
        echo "<a href='?pg=Principal-Admin'>Voltar</a>";
    }