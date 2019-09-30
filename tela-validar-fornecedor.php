<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Validar Fornecedor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo-tela-validar-fornecedor.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="site">
		<i class="fas fa-user-tie fa-4x"></i><i class="fas fa-check fa-2x"></i><br><br>
		<fieldset id="campo-cadastro">
		<legend id="legenda">Validar Fornecedor</legend>
		<form method="POST" action="#">

      <label for="rsocial">Razão Social:</label> <input type="text" id="rsocial" readonly="true" name="rsocial" value="SA. DISTRIBUIDORA"><br>
  		<label for="cnpj">CNPJ:</label> <input type="text" id="cnpj" readonly="true" name="cnpj"><br>

      <fieldset class="form-interno">
			<legend id="legenda-dados-login">Endereço</legend>
        <label for="rua">Rua:</label><input type="text" id="rua" readonly="true" name="rua">
  			<label for="num">Num:</label><input type="number" id="num" readonly="true" name="num" min="1"><br>
  			<label for="cep">CEP:</label><input type="text" id="cep" readonly="true" name="cep">
  			<label for="tel">Tel:</label><input type="tel" id="tel" readonly="true" name="tel">
			</fieldset>

			<fieldset class="form-interno">
			<legend id="legenda-dados-login">Dados de Login</legend>
				<label for="email">Email:</label><input type="email" id="email" readonly="true" name="email"><br>
				<label for="senha">Senha:</label><input type="password" id="senha" readonly="true" name="senha"><br>
			</fieldset>
			<input class="btn btn-success" type="submit" value="Validar" id="botao-validar">
			<input class="btn btn-danger" type="submit" value="Negar" id="botao-negar"><br>
		</form>
		</fieldset>
	</div>
</body>
</html>
