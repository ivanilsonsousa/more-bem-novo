<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("location: index.php");
		exit;
	}

	require_once "../_classes/BD.class.php";

	$bd = new BD();
	$indice = $_GET['id'];
	$acao = $_GET['acao'];
	$bd->abrir("meubanco", "localhost", "root", "");

	if($acao == "Apagar"){
			if($bd->msgErro == ""){ // tudo ok
				$bd->apagarFornecedor($indice);
				echo("<script>history.go(-1)</script>");
			} else {
				$m = "Erro: ".$bd->msgErro;
			}
	} elseif ($acao == "Editar") {
			header("location: ../tela-editar-item.php?id=$indice");
	}

?>
