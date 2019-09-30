<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Esqueceu a senha</title>
	<link rel="stylesheet" href="_css/estilo-tela-redefinir-senha.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="site">
	<i class="fas fa-key fa-4x"></i><br><br>
	<form method="POST" action="tela-nova-senha.php">
		<fieldset>
		<legend id="legenda-redefinir-senha">Redefinir Senha</legend>
			<label for="email">Email:</label><input type="email" id="email" name="email"><br>
			<input class="btn btn-success" type="submit" value="Enviar" id="botao"><br>
		</fieldset>
	</form>
</div>
</body>
</html>
