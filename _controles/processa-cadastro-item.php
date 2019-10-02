<?php
	require_once "verifica-autenticacao.php";
    require_once "conexao-banco.php";

	if(isset($_POST['material'])) {
		$material = addslashes($_POST['material']);
		$marca = addslashes($_POST['marca']);
		$medida = addslashes($_POST['medida']);

		if (!empty($material) && !empty($marca) && !empty($medida)) {
			if($bd->msgErro == ""){
				$i = new Item($material, $marca, $medida);
				$bd->inserirItem($i);
				unset($i);
			}
		}
	}
?>
