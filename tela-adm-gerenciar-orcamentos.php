<?php
	require_once "_classes/BD.class.php";

	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Gerenciar Orçamentos</title>
		<link rel="shortcut icon" href="_imagens/icone.png">
		<link rel="stylesheet" type='text/css' href="_css/estilo-tela-gerenciar-orcamentos-adm.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	</head>
	<body>

		<div class="site">
      <i class="fas fa-cogs fa-4x"></i><i class="fas fa-bars fa-2x"></i><br><br>
			<fieldset id="form-content">
				<legend>Gerenciar Orçamentos</legend><br>
        <div class="barra-pesquisa">
          <i id="mais" onclick="window.location.href='tela-novo-orcamento.php';" title="Adicionar Orçamento" class="fas fa-plus-circle fa-2x"></i>
        </div>
        <div id="div-pesquisa" class="blocoIcones">
          <input class="blocoIcones" type="text" placeholder="Pesquisar...">
          <button class="blocoIcones"><i class="fas fa-search"></i></button>
        </div>

				<div class="tabela table-responsive">
					<table class="tabela table table-hover">
						<thead>
							<tr>
								<th>Nome</th>
								<th></th>
								<th>Status</th>
								<th>Prazo</th>
								<th>Ações</th>
							</tr>
						</thead>

							<?php
								$lista = $bd->listarTodosOsItens();

								while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
									<tr>
										<td><?php echo "Obra Tal Tal";?></td>
										<td><a href="#">Detalhes</a></td>
	    							<td><?php echo $dado['material'];?></td>
	    							<td><?php echo $dado['medida'];?></td>
										<td>
											<a href="#" title="Apagar" class "bnt"><i id="lixo" class="fas fa-trash-alt"></i></a>|
											<a href="#" title="Editar" class="bnt"><i id="lapis" class="fas fa-pencil-alt"></i></a>
										</td>
									</tr>
							<?php
								} ?>

					</table>
				</div>

			</fieldset>
		</div>

	</body>
</html>
