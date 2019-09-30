<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Nova Senha</title>
	<link rel="stylesheet" href="_css/estilo-tela-nova-senha.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="site">
	<i class="fas fa-key fa-4x"></i><br><br>
	<form method="POST" action="index.php">
		<fieldset>
		<legend id="legenda-redefinir-senha">Nova Senha</legend>
			<label for="nova-senha">Nova Senha:</label><input type="password" id="nova-senha"><br><br>
			<label for="repetir-senha">Repetir Senha:</label><input type="password" id="repetir-senha"><br>

			<input class="btn btn-success" type="submit" value="Enviar" id="botao"><br>
		</fieldset>
	</form>
</div>
</body>
</html>
