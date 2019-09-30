<?php
	require_once "_classes/BD.class.php";

	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
?>

<html lang="pt-br">
<head>
	<title>Ver Fornecedores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="_css/estilo-tela-ver-fornecedores.css">
	<link rel="shortcut icon" href="_imagens/icone.png">
</head>
<body>
		<h2>FORNECEDORES DO BANCO DE DADOS</h2>
		
		<table>
				<tr>
					<th>Id</th>
					<th>Razão Social</th>
					<th>CNPJ</th>
					<th>Rua</th>
					<th>Número</th>
					<th>CEP</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Senha</th>
				</tr>

				<?php 
					$lista = $bd->listarTodosOsFornecedores();

					while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
						<tr>
							<td><?php echo $dado['idforn'];?></td>
							<td><?php echo $dado['rsocial'];?></td>
							<td><?php echo $dado['cnpj'];?></td>
							<td><?php echo $dado['rua'];?></td>
							<td><?php echo $dado['num'];?></td>
							<td><?php echo $dado['cep'];?></td>
							<td><?php echo $dado['tel'];?></td>
							<td><?php echo $dado['email'];?></td>
							<td><?php echo $dado['senha'];?></td>
						</tr>
				<?php
					} ?>

		</table>
</body>
</html>