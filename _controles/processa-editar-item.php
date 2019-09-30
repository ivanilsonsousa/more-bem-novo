<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("location: index.php");
		exit;
	}

	require_once "../_classes/BD.class.php";

	$bd = new BD();

	if(isset($_POST['material'])) {
		$id = addslashes($_POST['id']);
		$material = addslashes($_POST['material']);
		$marca = addslashes($_POST['marca']);
		$medida = addslashes($_POST['medida']);

		$m = "Mensagem Padrão";

		if (!empty($material) && !empty($marca) && !empty($medida)) {
			$bd->abrir("meubanco", "localhost", "root", "");

			if($bd->msgErro == "") { // tudo ok
					$i = new Item($material, $marca, $medida);
					$i->setId($id);

					$bd->editarItem($i);
					unset($i);
					$m = "Editado Com Sucesso!!!";
					//header("refresh: 0.1; ../tela-adm-gerenciar-itens.php");
					echo("<script>history.go(-2)</script>");
			}	else {
				$m = "Erro: ".$bd->msgErro;
				//echo('<script>alert("'.$m.'");</script>');
				header("refresh: 0.1; ../tela-editar-item.php?id=$id");
			}
		}	else {
			$m = "Preencha Todos os Campos";
			//echo('<script>alert("'.$m.'");</script>');
			header("refresh: 0.1; ../tela-editar-item.php?id=$id");
		}
	}

	echo('<script>alert("'.$m.'")</script>');

	//header("refresh: 0.1; ../area-privada.php");
?>
