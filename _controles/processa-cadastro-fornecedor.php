<?php 
	require_once "../_classes/BD.class.php";

	$bd = new BD();
	

	if(isset($_POST['rsocial'])) {
		$rsocial = addslashes($_POST['rsocial']);
		$cnpj = addslashes($_POST['cnpj']);
		$rua = addslashes($_POST['rua']);
		$num = addslashes($_POST['num']);
		$cep = addslashes($_POST['cep']);
		$tel = addslashes($_POST['tel']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$rsenha = addslashes($_POST['rsenha']);
		$m = "Mensagem Padrão";

		if (!empty($rsocial) && !empty($cnpj) && !empty($rua) && !empty($num) && !empty($cep) && !empty($tel) && !empty($email) && !empty($senha) && !empty($rsenha)){
			$bd->abrir("meubanco", "localhost", "root", "");
			
			if($bd->verificaExistencia($email)) {
				$m = "Email Já Cadastrado";
				echo("<script>history.go(-2)</script>");
			} elseif($bd->msgErro == "") {	
				if($senha == $rsenha) {
					$f = new Fornecedor($rsocial, $cnpj, $rua, $num, $cep, $tel, $email, $senha);
					$bd->inserirForncedor($f);
					unset($f);
					$m = "Cadastrado Com Sucesso!!!";
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