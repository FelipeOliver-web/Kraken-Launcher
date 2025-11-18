<?php

    require_once "Banco-Admin.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $imagem = $_POST["imagem"];
        $nome = $_POST["nome"];
        $link = $_POST["link"];
        $estatus = $_POST['estatus'];
    }else{
        echo "<H2>Envio de dados não permitido</H2>";
    }

    $sql = "INSERT INTO jogos (imagem, nome, link, estatus)
            VALUES ('$imagem', '$nome', '$link', '$estatus')";

    $inserir = mysqli_query($conexao, $sql);

    if($inserir) {
        echo "<H2>Cadastrado com sucesso</H2>";
        echo "<div class='footer-buttons'><button><a href='?pg=Principal-Admin'>Verificar</a></button></div>";
    }else{
        echo "Cadastrado não realizado.";
    }
    
?>