<?php
    require_once "verifica-autenticacao.php";
    require_once "conexao-banco.php";
    
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if($category == "Item") {
        $dado = $bd->listarItem($id);
        echo json_encode($dado);
    } else {
        echo("Parametros Incorretos!");
    }
?>