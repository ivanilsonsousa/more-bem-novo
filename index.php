<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="imageS/icone-logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/template-login.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

  <script type="text/javascript" src="./scripts/jquery-3.4.1.min.js"></script>
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
  <div class="acoes">
    <i class="icofont-business-man icofont-2x"></i>
    <h2> É um fornecedor?</h2>
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
      </div>
      <span olho><img id="olho" onclick="mostrarTexto()" src="images/eye-regular.svg"></span>
      <div class="botao-submit">
        <button type="submit">Entrar <i class="icofont-login"></i></button>
      </div>
    </form>				
    </div>
  </div>
</div>

<script type="text/javascript">
	// const formulario = document.querySelector('.formulario')
	// const botao = document.querySelector('button[type=submit]')

	// botao.onclick = (e) => {
	// 	e.preventDefault()
		
	// 	const fields = [...document.querySelectorAll('input')]
		
	// 	fields.forEach(field => {
	// 		if (field.value == '') {
	// 			formulario.classList.add('validate-error')
	// 			field.style.borderBottomColor = 'red'
	// 			field.onkeyup  = () => field.style.borderBottomColor = 'SlateBlue'
	// 		}
	// 	})

	// 	const formError = document.querySelector('.validate-error')
	
	// 	if (formError) {
	// 		formError.addEventListener('animationend', e => {
	// 			if (e.animationName == 'nono') {
	// 				formError.classList.remove('validate-error')
	// 			}	
	// 		})
	// 	}
	// }
</script>

<footer class="rodape">
  <span>&copy; <script> document.write(ano())</script> Todos os direitos reservados by <strong>Scorpion <i class="icofont-heart"></i>, Inc.</strong></span>
</footer>
</body>
</html>
