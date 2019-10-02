<?php
	require_once "verifica-autenticacao.php";
    require_once "conexao-banco.php";

	$indice = isset($_GET['id']) ? $_GET['id'] : null;
	$acao = isset($_GET['acao']) ? $_GET['acao'] : null;

	if($acao == "Apagar") {
		if($bd->msgErro == "") {
			$bd->apagarItem($indice);
		} else {
			$m = "Erro: ".$bd->msgErro;
		}
	} else if ($_POST['acao'] == "Editar") {
		$item = new Item($_POST['material'], $_POST['marca'], $_POST['medida']);
		$item->setId($_POST['id']);
		$bd->editarItem($item);
	}

?>
