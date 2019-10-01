<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("location: index.php");
		exit;
	}

	require_once "../_classes/BD.class.php";

	// print_r($_POST);
	// echo("AAA");

	// exit;

	$bd = new BD();
	// $indice = $_GET['id'];
	// $acao = $_GET['acao'];
	$bd->abrir("meubanco", "localhost", "root", "");

	if ($_POST['acao'] == "Editar") {
		echo("B");

		$item = new Item($_POST['material'], $_POST['marca'], $_POST['medida']);
		$item->setId($_POST['id']);
		$bd->editarItem($item);

		echo("sucesso!!!!");
	}


	// if($acao == "Apagar") {
	// 	if($bd->msgErro == "") {
	// 		$bd->apagarItem($indice);
	// 	} else {
	// 		$m = "Erro: ".$bd->msgErro;
	// 	}
	// } else if ($_POST['acao'] == "Editar") {
	// 	$item = new Item($_POST['material'], $_POST['marca'], $_POST['medida']);
	// 	$item.setId($_POST['id']);
	// 	$bd.editarItem($item);

	// 	echo("sucesso!!!!");
	// }

?>
