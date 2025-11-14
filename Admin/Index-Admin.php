<?php 

    include_once "Menu-Admin.php";
    
    if(empty($_SERVER["QUERY_STRING"])){
        $var = "Menu-Admin";
        include_once "$var.php";
    }elseif($_GET['pg']){
        $pg = $_GET['pg'];
        include_once "$pg.php";
    }else{
        echo "Página não encontrada";
    }
    ?>