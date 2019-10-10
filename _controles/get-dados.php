<?php
    require_once "verifica-autenticacao.php";
    require_once "conexao-banco.php";

    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $query = isset($_GET['query']) ? $_GET['query'] : null;

    if( $category == 'Item' ) {
        
        $dado = $bd->listarItem($id);
        echo json_encode($dado);
    } else if( $category == 'Fornecedor' ) {
        
        $pesquisa = $bd->pesquisarFornecedores($query);
        echo json_encode($pesquisa);
    } else if( isset($query) ) {

        $pesquisa = $bd->pesquisarItens($query);
        echo (json_encode($pesquisa));
        exit; // enquanto testo a funcionalidade
    }

?>