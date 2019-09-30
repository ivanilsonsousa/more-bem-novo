<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Novo Item</title>
	<link rel="stylesheet" href="_css/estilo-tela-novo-item.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="site">
	<i class="fas fa-box-open fa-4x"></i><i class="fas fa-plus fa-2x"></i><br><br>
	<form method="POST" action="_controles/processa-cadastro-item.php">
		<fieldset>
		<legend id="legenda-redefinir-senha">Novo Item</legend>

			<label for="material">Material:</label><input type="text" name="material" id="material">
			<label for="marca" id="label-marca">Marca:</label><input type="text" name="marca" id="marca"><br><br>
			<label for="medida">Unidade de Medida:</label><input name="medida" type="text" id="medida"><br>

		<input class="btn btn-success" type="submit" value="Salvar" id="botao"><br>
		</fieldset>
	</form>
</div>
</body>
</html>
