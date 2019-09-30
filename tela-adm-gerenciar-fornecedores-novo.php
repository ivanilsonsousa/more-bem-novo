<?php
	require_once "_classes/BD.class.php";

	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>NavBar - Exemplo</title>
	<link rel="stylesheet" href="_css/teste.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			  <a class="navbar-brand" href="#">
			    <img src="_imagens/logo.png" width="35" height="30" alt="">
			  </a>
			  <a class="navbar-brand" href="#">More Bem</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="tela-inicial-adm.php">Home<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Ações
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="tela-adm-gerenciar-usuarios.php">Usuários</a>
			          <a class="dropdown-item" href="tela-adm-gerenciar-orcamentos.php">Orçamentos</a>
								<a class="dropdown-item" href="tela-adm-gerenciar-ofertas.php">Ofertas</a>
								<a class="dropdown-item" href="tela-adm-gerenciar-fornecedores.php">Fornecedores</a>
								<a class="dropdown-item" href="tela-adm-mensagens.php">Mensagens</a>
								<a class="dropdown-item" href="tela-adm-gerenciar-itens.php">Itens</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Sair</a>
			        </div>
			      </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
	<div class="container corpo">
		<i class="fas fa-cogs fa-5x"></i><i class="fas fa-user-tie fa-3x"></i><br><br>
		<fieldset>
			<legend id="legenda">Gerenciar Fornecedores</legend><br>
			<div class="barra-pesquisa">
			</div>
			<div id="div-pesquisa" class="bloco-pesquisa">
				<input type="text" placeholder="Pesquisar...">
				<button><i class="fas fa-search"></i></button>
			</div>
			<button type="button" onclick="window.location.href='tela-adm-novos-fornecedores-inscritos.php';" class="btn btn-default" name="button"><i class="fas fa-suitcase"></i><br><label>Validar Fornecedores</label></button>
			<br>
			<div class="tabela table-responsive">
				<table class="tabela table table-hover table-striped">
					<thead class="thead-dark">
						<tr>
							<th>Razão Social</th>
							<th>Rua</th>
							<th>Número</th>
							<th>Telefone</th>
							<th>Apagar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$lista = $bd->listarTodosOsFornecedores();
							while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>
									<td><?php echo $dado['rsocial'];?></td>
									<td><?php echo $dado['rua'];?></td>
									<td><?php echo $dado['num'];?></td>
									<td><?php echo $dado['tel'];?></td>
									<td>
										<a href="#"><i class="op + fas fa-trash-alt"></i></a>
									</td>
								</tr>
						<?php
							} ?>
					</tbody>
				</table>
			</div>
		</fieldset>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
