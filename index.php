<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="_imagens2/icone-logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/template-login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/funcoes.js"></script>
</head>
<body>
<header class="cabecalho">
        <div class="logo">
			<img href="#inicio" src="images/icone-logo.png" alt="nao carregou">
        </div>
        <div class="titulo">
			<h2><strong>MORE BEM</strong></h2>
		</div>
    </header>
	<div class="meio">
		<div class="conteudo">
			<div class="logo logo-principal">
				<img src="images/logo.png" alt="nao carregou">
			</div>

			<div class="formulario">
			<form id="form" method="POST" action="_controles/processa-login.php">
				<div class="linha legenda"><h2>Login</h2></div>
				<div class="linha">
					<i class="icofont-user-alt-4"></i>
					<input type="text" name="usuario" id="usuario" placeholder="Digite seu email..."><br>
				</div>
				<div class="linha" senha>
					<i class="icofont-key"></i>
					<input type="password" name="senha" id="senha" placeholder="Digite a senha...">
					<!-- <span olho><img id="olho" onclick="mostrarTexto()" src="_imagens/eye-regular.svg"></span> -->
					<!-- <div class="logo">
						<img src="_imagens/logo.png" alt="nao carregou">
					</div> -->
				</div>
				<div class="botao-submit">
					<button type="submit">Entrar <i class="icofont-login"></i></button>
				</div>
			</form>				
			</div>
		</div>
	</div>
	<footer class="rodape">
		<span>&copy; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion <i class="icofont-heart"></i>, Inc.</strong></span>
	</footer>
</body>
</html>
