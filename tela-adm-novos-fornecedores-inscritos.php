<?php
	require_once "_classes/BD.class.php";

	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Novos Fornecedores Inscritos</title>
		<link rel="shortcut icon" href="_imagens/icone.png">
		<link rel="stylesheet" type='text/css' href="_css/estilo-tela-gerenciar-fornecedores-adm.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
		<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="site">
      <i class="fas fa-cogs fa-4x"></i><i class="fas fa-user-tie fa-2x"></i><br><br>
			<fieldset>
				<legend id="legenda">Novos Fornecedores Inscritos</legend><br>
        <div class="barra-pesquisa">
        </div>
				<div id="div-pesquisa" class="blocoIcones">
          <input class="blocoIcones" type="text" placeholder="Pesquisar...">
          <button class="blocoIcones"><i class="fas fa-search"></i></button>
        </div>
				<div class="tabela table-responsive thead-dark table-striped">
					<table class="tabela table table-hover">
						<thead>
							<tr>
								<th>Razão Social</th>
								<th>Detalhes</th>
								<th>Rua</th>
								<th>Número</th>
								<th>Telefone</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$lista = $bd->listarTodosOsFornecedores();
								while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
									<tr>
										<td><?php echo $dado['rsocial'];?></td>
										<td>
											<a href="tela-validar-fornecedor.php" title="Mostrar mais detalhes" class "bnt"><i class="fas fa-info-circle"></i></a>
										</td>
										<td><?php echo $dado['rua'];?></td>
										<td><?php echo $dado['num'];?></td>
										<td><?php echo $dado['tel'];?></td>
									</tr>
							<?php
								} ?>
						</tbody>
					</table>
				</div>
			</fieldset>
		</div>
	</body>
</html>
