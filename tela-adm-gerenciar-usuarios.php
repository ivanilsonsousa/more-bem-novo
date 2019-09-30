<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Gerenciar Usuários</title>
		<link rel="shortcut icon" href="_imagens/icone.png">
		<link rel="stylesheet" type='text/css' href="_css/estilo-tela-gerenciar-usuarios-adm.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
		<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	</head>
	<body>

		<div class="site">
      <i class="fas fa-cogs fa-4x"></i><i class="fas fa-address-card fa-2x"></i><br><br>
			<fieldset id="form-content">
				<legend>Gerenciar Usuários</legend><br>
        <div class="barra-pesquisa">
          <i id="mais" onclick="window.location.href='tela-novo-usuario.php';" title="Adicionar Usuário" class="fas fa-plus-circle fa-2x"></i>
        </div>
        <div id="div-pesquisa" class="blocoIcones">
          <input class="blocoIcones" type="text" placeholder="Pesquisar...">
          <button class="blocoIcones"><i class="fas fa-search"></i></button>
        </div>
        <div onclick="window.location.href='tela-adm-meu-perfil.php';" class="botao">
          <i class="fas fa-address-book"></i>
          <label>Meu Perfil</label>
        </div>

        <!-- <a href="tela-ver-usuarios.php">Ver Usuarios</a> -->
        <!-- <a href="tela-novo-usuario.php">Adicionar Usuario</a> -->

			</fieldset>
		</div>

	</body>
</html>
