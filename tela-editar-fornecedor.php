<?php
    session_start();
	if (!isset($_SESSION['idforn'])) {
		header("location: index.php");
		exit;
	}
	
	require_once "_classes/BD.class.php";
	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");

	$id = $_SESSION['idforn'];
	$dado = $bd->listarFornecedor($id);
	
	$f = new Fornecedor($dado['rsocial'], $dado['cnpj'], $dado['rua'], $dado['num'], $dado['cep'], $dado['tel'], $dado['email'], $dado['senha']);

	$f->setIdForn($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Perfil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo-tela-editar-fornecedor.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
</head>
<body>

	<fieldset id="campo-cadastro">
	<legend id="legenda">Editar Dados</legend>
	<form method="POST" action="_controles/processa-editar-fornecedor.php">

		<label for="rsocial">Razão Social:</label> <input type="text" id="rsocial" name="rsocial" value="<?php echo $f->getRazaoSocial();?>">
		<label for="idforn">ID:</label> <input type="text" id="idforn" readonly="true" name="idforn" value="<?php echo $f->getIdForn();?>"><br>
		<label for="cnpj">CNPJ:</label> <input type="text" id="cnpj" name="cnpj" value="<?php echo $f->getCNPJ();?>"><br>

		<fieldset id="endereco" class="form-interno">
		<legend id="legenda-end">Endereço</legend>
			<label for="rua">Rua:</label><input type="text" id="rua" name="rua" value="<?php echo $f->getRua();?>">
			<label for="num">Num:</label><input type="number" id="num" name="num" min="1" value="<?php echo $f->getNum();?>"><br>
			<label for="cep">CEP:</label><input type="text" id="cep" name="cep" value="<?php echo $f->getCEP();?>">
			<label for="tel">Tel:</label><input type="tel" id="tel" name="tel" value="<?php echo $f->getTel();?>">
		</fieldset>

		<fieldset id="dados-login" class="form-interno">
		<legend id="legenda-dados-login">Dados de Login</legend>
			<label for="email">Email:</label><input type="email" id="email" readonly="true" name="email" value="<?php echo $f->getEmail();?>"><br>
			<label for="senha">Senha:</label><input type="password" id="senha" name="senha"><br>
			<label for="num">Repetir Senha:</label><input type="password" id="rsenha" name="rsenha"><br>
		</fieldset>
		<input type="submit" value="Editar" id="botao"><br>
	</form>
	</fieldset>
</body>
</html>