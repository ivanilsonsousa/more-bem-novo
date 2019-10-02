<?php
    require_once "conexao-banco.php";

	$usuario = addslashes($_POST["usuario"]);
	$senha = addslashes($_POST["senha"]);
		
	if (!empty($usuario) && !empty($senha)) {
		$bd->abrir("meubanco", "localhost", "root", "");
		if ($bd->msgErro == ""){
			if ($bd->logar($usuario, $senha)) {
				header("location: ../tela-inicial-adm.php");
			} else {
				echo('<script>alert("Email e/ou senha incorretos");</script>');
				echo("<script>history.go(-1)</script>");
			}
		}
	} else {
		echo('<script>alert("Preencha todos os campos");</script>');
		echo("<script>history.go(-1)</script>");
	}
?>
