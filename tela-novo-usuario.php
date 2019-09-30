<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Usuário</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="_css/estilo-tela-novo-usuario.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<script type="text/javascript" src="_scripts/funcoes.js"></script>
	<script src="_scripts/jquery-3.4.1.min.js"></script>
	<script src="_scripts/jquery.mask.js"></script>

</head>
<body>
	<div class="site">
		<i class="fas fa-user-plus fa-4x"></i><br><br>
		<fieldset id="campo-cadastro">
		<legend id="legenda">Cadastrar Usuário</legend>
		<form method="POST" action="_controles/processa-cadastro-usuario.php">

			<label for="nome">Nome:</label> <input type="text" id="nome" name="nome"><br>
			<label for="cnpj">CPF:</label> <input type="text" id="cpf" name="cpf"><br>

			<fieldset class="form-interno">
			<legend id="legenda-end">Tipo de Usuário</legend>
				<div class="tipos">
					<input type="radio" name="tipo" id="adm" value="Administrador"><label id="label-adm" for="adm"> Administrador</label>
					<input type="radio" name="tipo" id="pad" value="Padrão" checked><label id="label-pad" for="pad"> Padrão</label>
				</div>
			</fieldset>

			<fieldset class="form-interno">
			<legend id="legenda-dados-login">Dados de Login</legend>
				<label for="email">Email:</label><input type="email" id="email" name="email"><br>
				<label for="senha">Senha:</label><input type="password" id="senha" name="senha"><br>
				<label for="rsenha">Repetir Senha:</label><input type="password" id="rsenha" name="rsenha"><br>
			</fieldset>
			<input class="btn btn-success" type="submit" value="Cadastrar" id="botao"><br>
		</form>
		</fieldset>
	</div>

	<script>
		$(document).ready(function(){
			$("#cpf").mask("000.000.000-00", {placeholder: "000.000.000-00"})
		});
	</script>
</body>
</html>
