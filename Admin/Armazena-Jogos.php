<?php

    require_once "Banco-Admin.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $imagem = $_POST["imagem"];
        $nome = $_POST["nome"];
        $link = $_POST["link"];
    }else{
        echo "<H2>Envio de dados não permitido</H2>";
    }

    $sql = "INSERT INTO cards (imagem, nome, link)
            VALUES ('$imagem', '$nome', '$link')";

    $inserir = mysqli_query($conexao, $sql);

    if($inserir) {
        echo "<H2>Cadastrado com sucesso</H2>";
        echo "<a href=../index.php>Verificar</a>";
    }else{
        echo "Cadastrado não realizado.";
    }
    
?>