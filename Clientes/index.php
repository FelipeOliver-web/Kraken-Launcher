<?php
session_start();

// 2. Lógica de Cabeçalho Condicional
// Verifica se a sessão 'is_admin' foi definida e é verdadeira (indicando o login especial)
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
    // Inclui o header especial para o administrador/usuário específico
    include_once "Header-Admin.php";
} else {
    // Inclui o header padrão para clientes e usuários não logados
    include_once "Header-Clientes.php";
}

// 1. Inclui o script de busca (mantendo a ordem mais comum)

include_once "Busca.php";

// 3. Lógica de Roteamento/Inclusão de Conteúdo Principal
if(empty($_SERVER['QUERY_STRING'])){
    // Se não houver parâmetro na URL, carrega a página principal padrão
    $var = "Pagina-Principal";
    include_once "$var.php";
} else {
    // Pega o parâmetro 'pg' da URL (ex: index.php?pg=produtos)
    $pg = $_GET['pg'];
    // Inclui a página solicitada
    include "$pg.php";
}

// 4. Inclui o rodapé
include_once "Footer.php";
?>