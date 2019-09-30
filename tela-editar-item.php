<?php
  session_start();
	if (!isset($_SESSION['id'])) {
		header("location: index.php");
		exit;
	}

	require_once "_classes/BD.class.php";
	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");

	$id = $_GET['id'];
	$dado = $bd->listarItem($id);

	$i = new Item($dado['material'], $dado['marca'], $dado['medida']);

	$i->setId($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Item</title>
	<link rel="stylesheet" href="_css/estilo-tela-novo-item.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="site">
	<i class="fas fa-box-open fa-4x"></i><i class="fas fa-pencil-alt fa-2x"></i><br><br>
	<form method="POST" action="_controles/processa-editar-item.php">
		<fieldset>
		<legend id="legenda-redefinir-senha">Editar Item</legend>
			<input type="hidden" name="id" id="id" value="<?php echo $i->getId();?>">
			<label for="material">Material:</label><input type="text" name="material" id="material" value="<?php echo $i->getMaterial();?>">
			<label for="marca" id="label-marca">Marca:</label><input type="text" name="marca" id="marca" value="<?php echo $i->getMarca();?>"><br><br>
			<label for="medida">Unidade de Medida:</label><input name="medida" type="text" id="medida" value="<?php echo $i->getMedida();?>"><br>

		<input class="btn btn-success" type="submit" value="Editar" id="botao"><br>
		</fieldset>
	</form>
</div>
</body>
</html>
