<?php 
	require_once "../_classes/BD.class.php";

	$bd = new BD();
	

	if(isset($_POST["nome"])) {
		$nome = addslashes($_POST["nome"]);
		$cpf = addslashes($_POST["cpf"]);
		$tipo = addslashes($_POST["tipo"]);
		$email = addslashes($_POST["email"]);
		$senha = addslashes($_POST["senha"]);
		$rsenha = addslashes($_POST["rsenha"]);
		$m = "Mensagem Padrão";

		if(!empty($nome) && !empty($cpf) && !empty($tipo)  && !empty($email) && !empty($senha) && !empty($rsenha)) {
			$bd->abrir("meubanco", "localhost", "root", "");
			
			if($bd->verificaExistencia($email)) {
				$m = "Email Já Cadastrado";
				echo("<script>history.go(-1)</script>");
			} elseif($bd->msgErro == "") {	
				if($senha == $rsenha) {
					$u = new Usuario($nome, $cpf, $tipo, $email, $senha);
					$bd->inserirUsuario($u);
					unset($u);
					$m = "Cadastrado Com Sucesso!";
					echo("<script>history.go(-2)</script>");
				} else {
					$m = "Senha e Confirmar Senha não correspondem!";
					echo("<script>history.go(-1)</script>");
				}
			} else {
				$m = "Erro: ".$bd->msgErro;
				echo("<script>history.go(-1)</script>");
			}
		} else {
			$m = "Preencha Todos os Campos";
			echo("<script>history.go(-1)</script>");
		}
	}

	echo('<script>alert("'.$m.'");</script>');
?>