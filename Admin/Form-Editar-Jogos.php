<?php
    require "Banco-Admin.php";

    $id = $_REQUEST["id"];

    $sql = "SELECT * FROM jogos WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)){
            $id = $dados["id"];
            $imagem = $dados["imagem"];
            $nome = $dados["nome"];
            $link = $dados["link"];
        }

?>
<h2>Alteração de dados dos jogos</h2>
<form action="?pg=Edita-Jogos" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Link da Imagem:</label>
    <input type="text" name="imagem" value="<?=$imagem?>" required><br>
    <label>Nome do Jogo:</label>
    <input type="text" name="nome" value="<?=$nome?>"><br><br>
    <label>Link do Jogo:</label>
    <input type="text" name="link" value="<?=$link?>"><br><br>
    <input type="submit" value="Alterar">
</form>
<?php
}else{
        echo "<br><h2>Nenhum jogo encontrado</h2>";
    }
?>