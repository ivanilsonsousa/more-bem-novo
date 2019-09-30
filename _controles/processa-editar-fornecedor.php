<?php 
	require_once "../_classes/BD.class.php";

	$bd = new BD();
	
	if(isset($_POST['rsocial'])) {
		$idforn = addslashes($_POST['idforn']);
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

		if (!empty($idforn) && !empty($rsocial) && !empty($cnpj) && !empty($rua) && !empty($num) && !empty($cep) && !empty($tel) && !empty($email) && !empty($senha) && !empty($rsenha)) {
			$bd->abrir("meubanco", "localhost", "root", "");
			
			if($bd->msgErro == "") { //tudo ok	
				if($senha == $rsenha) {
					$f = new Fornecedor($rsocial, $cnpj, $rua, $num, $cep, $tel, $email, $senha);
					$f->setIdForn($idforn);

					$bd->editarFornecedor($f);
					unset($f);
					$m = "Editado Com Sucesso!!!";
					header("refresh: 0.1; ../area-privada.php");
				} else {
					$m = "Senha e Confirmar Senha não correspondem!";
					//echo('<script>alert("'.$m.'");</script>');
					//header("refresh: 0.1; ../tela-editar-fornecedor.php");
					echo("<script>history.go(-1)</script>");
				}
			} else {
				$m = "Erro: ".$bd->msgErro;
				//echo('<script>alert("'.$m.'");</script>');
				//header("refresh: 0.1; ../tela-editar-fornecedor.php");
				echo("<script>history.go(-1)</script>");
			}
		} else {
			$m = "Preencha Todos os Campos";
			//echo('<script>alert("'.$m.'");</script>');
			//header("refresh: 0.1; ../tela-editar-fornecedor.php");
			echo("<script>history.go(-1)</script>");
		}
	}

	echo('<script>alert("'.$m.'");</script>');
	//echo("<script>history.go(-1)</script>");

	//header("refresh: 0.1; ../area-privada.php");
?>