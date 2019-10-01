<?php
    session_start();
	if (!isset($_SESSION['id'])) {
		header("location: index.php");
		exit;
	}

    require_once "../_classes/BD.class.php";

    $bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
    
    $category = $_GET['category'];

    if($category == "Item") {
        $id = $_GET['id'];
        $dado = $bd->listarItem($id);

        // print_r($dado);

        echo json_encode($dado);
        // print($teste);

        // print("<br>")
        // print_r($i);

        // foreach ($i as $key => $value) {
        //     $f[]=$value; 
        // }

        // print_r($_GET);

        // print_r($teste);
        // print_r($i);
    }

?>