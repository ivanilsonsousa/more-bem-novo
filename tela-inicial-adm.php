<?php require_once "_controles/verifica-autenticacao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="./images/icone-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/template-inicial.css">
		<script type="text/javascript" src="./scripts/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="./scripts/funcoes.js"></script>
	</head>
	<header class="cabecalho">
        <div class="logo">
			<img src="images/icone-logo.png" alt="nao carregou">
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
                    <a selecionado href="#Home">Home</a>
                </li>
                <li>
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
			<i onclick='popup("modalSair")' class="icofont-sign-out icofont-2x"></i>
        </aside>
    </header>
<body>
<div class="meio">
	<div class="opcoes">
		
		<div class="card">
			<div class="simbolo">
				<img class="svg" src="images/human-resources.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Usuários</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img class="svg" src="images/statistics.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Orçamentos</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img class="svg" src="images/analytics.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Ofertas</p>
			</div>
		</div>
		<div class="card" onclick="window.location.href='tela-adm-gerenciar-fornecedores.php';">
			<div class="simbolo">
				<img class="svg" src="images/businessman.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Fornecedores</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img class="svg" src="images/chat.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Mensagens</p>
			</div>
		</div>
		<div class="card" onclick="window.location.href='tela-adm-gerenciar-itens.php';">
			<div class="simbolo">
				<img class="svg" src="images/production.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Itens</p>
			</div>
		</div>
		
	</div>

</div>
</body>
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
<footer class="rodape">
		<span>&copy; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion <i class="icofont-heart"></i>, Inc.</strong></span>
</footer>
</html>
