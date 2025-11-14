<?php

    include_once "Header-Admin.php";
    include_once "Principal-Admin.php";

    if(empty($_SERVER["QUERY_STRING"])){
        $var = "Principal-Admin";
        include_once "$var.php";
    }elseif($_GET['pg']){
        $pg = $_GET['pg'];
        include_once "$pg.php";
    }else{
        echo "Página não encontrada";
    }

?>