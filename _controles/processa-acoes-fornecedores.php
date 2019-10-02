<?php
	require_once "verifica-autenticacao.php";
    require_once "conexao-banco.php";

	$indice = $_GET['id'];
	$acao = $_GET['acao'];
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
