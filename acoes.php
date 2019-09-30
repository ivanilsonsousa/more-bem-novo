<?php
	require_once "_classes/BD.class.php";

    if (isset($_POST['indice'])){
		$bd = new BD();
		$bd->abrir("meubanco", "localhost", "root", "");

    $indice = $_POST['indice'];
		$dado = $bd->listarItem($indice);

		$item = array($dado['id'], $dado['marca'], $dado['medida']);
		echo "$item[0]&$item[1]&$item[2]";
    }
?>
