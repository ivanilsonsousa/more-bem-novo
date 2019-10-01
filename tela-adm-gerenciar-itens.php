<?php require('_classes/conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="_imagens/icone-logo.png">
	<link rel="stylesheet" type="text/css" href="css/template-gerenciar.css">
</head>
<header class="cabecalho">
	<div class="logo">
		<a href="tela-inicial-adm.php" title="Ir para Home"><img src="_imagens/icone-logo.png" alt="nao carregou"></a>
	</div>
	<div class="titulo">
		<h2><strong>MORE BEM</strong></h2>
	</div>
	<div class="dropdown">
		<button onclick='alert("MENU TOGLLE")' class="menu-toggle">
			<i class="fa fa-lg fa-bars fa-2x"></i>
		</button>
		<!-- <ul>
			<li>Item1</li>
		</ul>
		<ul>
			<li>Item2</li>
		</ul>
		<ul>
			<li>Item3</li>
		</ul> -->
	</div>
	<nav class="menu">
		<ul>
			<li>
				<a href="#Home">Home</a>
			</li>
			<li selecionado>
				<a href="#">Fornecedores</a>
			</li>
			<li>
				<a href="#sobre">Orçamentos</a>
			</li>
			<li>
				<a href="#contato">Ofertas</a>
			</li>
		</ul>
	</nav>
	<aside class="autenticacao">
		<i title="Sair" onclick='popup("modalSair")' id="btnSair" class="icofont-sign-out icofont-2x"></i>
	</aside>
</header>
<body>
<div class="meio">
	<div class="conteudo">
		<div class="div-dados-gerenciar">
			<img src="_imagens/production.svg" alt="Gerenciar Itens">
			<h1>Gerenciar Itens</h1>
		</div>
		<div class="barra-op">
			<div class="div-pesquisa">
				<input type="text" name="pesquisa" placeholder="Pesquisar Item...">
				<button><img src="_imagens/lupa.svg" alt=""></button>
			</div>
			<div class="botao">
				<button id="myBtn" onclick='popup("myModal")'>Adicionar Item<img src="images/plus.svg" alt=""></button>
			</div>
		</div>
		<div class="tabela">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Material</th>
						<th>Marca</th>
						<th>Unidade de Medida</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$lista = $bd->listarTodosOsItens();
						
						while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>
								<td><?php echo $dado['id'];?></td>
								<td><?php echo $dado['material'];?></td>
								<td><?php echo $dado['marca'];?></td>
								<td><?php echo $dado['medida'];?></td>
								<td>
									<a onclick='excluirItem(<?php echo $dado["id"];?>,"modalExcluir")' title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a> |
									<a onclick='editarItem(<?php echo $dado["id"];?>,"modalEditar")' title="Editar" class="bnt"><i id="lapis" class="icofont-pencil-alt-5"></i></a>
								</td>
							</tr>
							<?php
						} ?>
				</tbody>
			</table>
		</div> 
		<!-- href='_controles/processa-acoes-itens.php?acao=Editar&id=<?php echo $dado["id"];?>' -->
	</div>
</div>
</body>

<div id="myModal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<h3 class="titulo"><i class="icofont-box icofont-2x"></i> Adicionar Novo Item</h3>
			<span sair class="close" title="Fechar"><i class="icofont-close-circled"></i></span>
		</div>
		<div class="modal-body">
		<form id="pop_form" method="POST">
			<div class="cols cols2">
				<div class="campo">
					<label for="material">Material</label>
					<input type="text" name="material" id="nome">
				</div>
				<div class="campo">
					<label for="marca">Marca</label>
					<input type="text" name="marca" id="snome">
				</div>
			</div>
			<div class="cols">
				<div class="campo">
					<label for="snome">Unidade de Medida</label>
					<input type="text" name="medida" id="snome">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button id="enviar"><i class="icofont-check"></i> Sim</button>
		</form>
			<button cancelar id="cancel"><i class="icofont-not-allowed"></i> Não</button>
		</div>
	</div>
</div>
<!-- Modal Editar -->
<div id="modalEditar" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<h3 class="titulo"><i class="icofont-box icofont-2x"></i> Editar Item</h3>
			<span sair class="close" title="Fechar"><i class="icofont-close-circled"></i></span>
		</div>
		<div class="modal-body">
		<form id="pop_form_editar" method="POST">
			<div class="cols cols2">
				<div class="campo">
					<label for="material">Material</label>
					<input type="text" name="material" id="nome">
				</div>
				<div class="campo">
					<label for="marca">Marca</label>
					<input type="text" name="marca" id="snome">
				</div>
			</div>
			<div class="cols">
				<div class="campo">
					<label for="snome">Unidade de Medida</label>
					<input type="text" name="medida" id="snome">
				</div>
			</div>
		</div>
		<input hidden type="text" name="id">
		<div class="modal-footer">
			<button id="enviar"><i class="icofont-check"></i> Sim</button>
		</form>
			<button cancelar id="cancel"><i class="icofont-not-allowed"></i> Não</button>
		</div>
	</div>
</div>

<!-- Modal Sair -->
<div id="modalSair" class="modal">
	<div class="modal-content modal-alert">
		<div class="modal-header">
			<h3 class="titulo"><i class="icofont-question-circle"></i> Deseja realmente sair do Sistema?</h3>
			<span sair class="close" title="Fechar"><i id="closeSair" class="icofont-close-circled"></i></span>
		</div>
		<div class="modal-footer">
			<button onclick="window.location.href='_controles/sair.php';" id="sair"><i class="icofont-check"></i> Sim</button>
			<button cancelar id='cancelSair'><i class="icofont-not-allowed"></i> Não</button>
		</div>
	</div>
</div>

<!-- Modal Excluir -->
<div id="modalExcluir" class="modal">
	<div class="modal-content modal-alert">
		<div class="modal-header">
			<h3 class="titulo"><i class="icofont-question-circle"></i> Deseja realmente excluir esse Item?</h3>
			<span sair class="close" title="Fechar"><i id="closeSair" class="icofont-close-circled"></i></span>
		</div>
		<div class="modal-footer">
			<button confirmar><i class="icofont-check"></i> Sim</button>
			<button cancelar id='cancelSair'><i class="icofont-not-allowed"></i> Não</button>
		</div>
	</div>
</div>

<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>
<footer class="rodape">
	<span>&copy; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion <i class="icofont-heart"></i>, Inc.</strong></span>
</footer>
</html>
