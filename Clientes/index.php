<?php
session_start();
    include_once "Header.php";
    include_once "Busca.php";

    if(empty($_SERVER["QUERY_STRING"])){
        $var = "Pagina-Principal";
        include_once "$var.php";
    }else{
        $pg = $_GET['pg'];
        include "$pg.php";
    }

    include_once "Footer.php";