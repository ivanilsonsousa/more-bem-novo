<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="_imagens/icone-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/template-inicial.css">
		<script type="text/javascript" src="_scripts/funcoes.js"></script>
	</head>
	<header class="cabecalho">
        <div class="logo">
			<img src="_imagens/icone-logo.png" alt="nao carregou">
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
			<i class="icofont-sign-out icofont-2x"></i>
        </aside>
    </header>
<body>
<div class="meio">
	<div class="opcoes">
		
		<div class="card">
			<div class="simbolo">
				<img src="_imagens/human-resources.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Usuários</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img src="_imagens/statistics.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Orçamentos</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img src="_imagens/analytics.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Ofertas</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img src="_imagens/businessman.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Fornecedores</p>
			</div>
		</div>
		<div class="card">
			<div class="simbolo">
				<img src="_imagens/chat.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Mensagens</p>
			</div>
		</div>
		<div class="card" onclick="window.location.href='tela-adm-gerenciar-itens.php';">
			<div class="simbolo">
				<img src="_imagens/production.svg" alt="">
			</div>
			<div class="paragrafo">
				<p>Gerenciar Itens</p>
			</div>
		</div>
		
	</div>

</div>
</body>
<footer class="rodape">
		<span>&#169; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion <i class="icofont-heart"></i>, Inc.</strong></span>
</footer>
</html>

<?php
//  session_start();
//  if (!isset($_SESSION['id'])) {
//    header("location: index.php");
//    exit;
//  }
//  
//  require_once "_classes/BD.class.php";
//  $bd = new BD();
//  $bd->abrir("meubanco", "localhost", "root", "");
//
//  $id = $_SESSION['id'];
//
//  $dado = $bd->listarUsuario("1");
//	
//  $user = $dado['nome'];
?>

