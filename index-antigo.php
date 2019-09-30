<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="_imagens/icone-logo.png">
	<!-- <link rel="stylesheet" type="text/css" href="_css/estilo-login.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

	<script type="text/javascript" src="_scripts/funcoes.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		body {
            /* background-color: lightgray; */
			height: 100vh;
			display: grid;
			font-weight: bold;
			grid-template-rows: auto 60px;
			align-items: center;
	
        }
		.site {
			display: grid;
			justify-items: center;
		}
		
		 @media(min-width: 845px) {
			.site {
				display: grid;
				/* justify-items: center; */
				grid-template-columns: 50% 50%;
			}
			
        }
		@media(min-width: 0px) {
			.site {
				display: grid;
				grid-template-rows: 50% 50%;
			}
			.logo img {
				position: relative;
				right: 20px;
			}
		}
		.menu-toggle {
            color: #eee;
            background-color: #555;
            border: solid 1px #777;
            border-radius: 5px;
            height: 40px;
            padding: 10px 20px;
            margin: 5px 10px 5px 5px;
        }
		.linha {
			display: flex;
			align-items: center;
			height: 35px;
			margin-bottom: 10px; 
		}
		.cad-forn {
			margin-top: 10px;
			display: flex;
			justify-content: center;
		}
		.div-botao {
			height: 35px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.div-botao button {
			height: 90%;
			/* background: #3c4888; */
			background: rgba(9,9,121,1);
			color: white;
			width: 90px;
			margin-right: 13px;
			cursor: pointer;
			border: none;
			border-radius: 5px;
			outline: none;
		}
		.div-botao button:hover {
			opacity: 0.9;
		}
		.linha label {
			padding-right: 10px;
			margin-left: 5px;
		}
		.linha i {
			position: relative;
			left: 20px;
			z-index: 10000000;
		}
		[olho] {
			position: relative;
			right: 38px;
			white: 20px;
			height: 20px;
			z-index: 1000;
		}
		.linha input {
			height: 92%;
			width: 290px;
			padding: 0px 30px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		.linha input[type="password"] {
			width: 297px;
		}
		.logo {
			display: flex;
			flex-direction: column;
			align-items: center;
			height: 220px;
		}
        .logo img, .logo-mobile img{
            height: 100%;
        }
		.logo-mobile {
			display: none;
			height: 220px;
		}
		.legenda {
			font-size: 16pt;
			font-weight: bold;
		}
		.formulario {
			height: 220px;
			font-family: arial;
			font-size: 10pt;
		}
		.formulario fieldset {
			height: 100%;
			width: 400px;
			border: 1px #888 solid;
			padding: 25px 10px 10px 10px;
			/* background: #ffe; */
			/* box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3); */

			border-radius: 5px;
            /* box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3); */
			border-bottom: 5px solid darkblue;
		}
		.formulario a {
			font-size: 8pt;
		}
		.esqueceu a {
			margin-left: 70px;
		}
		.senha img {
			width: 20px;
			height: 20px;
			position: relative;
			right: 60px;
			top: 1px;
		}
		.rodape {
			height: 100%;
			width: 100%;
			background: #073999;
			/* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 38%, rgba(0,212,255,1) 100%); */
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: Arial, serif;
			font-weight: bold;
			color: white;
		}
	</style>
</head>
<body>
	<div class="site">
		<div class="logo">
			<img src="_imagens/logo.png" alt="nao carregou">
		</div>
		<div class="logo-mobile">
			<img src="_imagens/logo-mobile.png" alt="nao carregou">
		</div>

		<div class="formulario">
			<fieldset>
			<legend class="legenda">Login</legend>
			<form id="form" method="POST" action="_controles/processa-login.php">
				<div class="linha">
					<label id="label-user" for="usuario">Usuário:</label>
					<i id="man" class="fas fa-user"></i>
					<input type="text" name="usuario" id="usuario" placeholder="Digite seu email..."><br>
				</div>
				<div class="linha" senha>
					<label id="label-senha" for="senha">Senha:</label>
					<i id="cadeado" class="fas fa-lock"></i>
					<input type="password" name="senha" id="senha" placeholder="Digite a senha...">
					<!-- <span olho><img id="olho" onclick="mostrarTexto()" src="_imagens/eye-regular.svg"></span> -->
					<!-- <div class="logo">
						<img src="_imagens/logo.png" alt="nao carregou">
					</div> -->
				</div>

				<div class="div-botao esqueceu">
					<a href="tela-esqueceu-senha.php">Esqueceu a senha?</a>
					<button type="submit" id="botao">Confirmar</button>
				</div>
				
			</form>
			<div class="cad-forn">
				<a href="tela-novo-fornecedor.php">Cadastrar-se como fornecedor</a>
			</div>
			</fieldset>
		</div>
	</div>
	<footer class="rodape">
		<span>&#169; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion, Inc.</strong></span>
	</footer>
</body>
</html>
