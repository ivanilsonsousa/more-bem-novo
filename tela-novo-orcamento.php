<?php
	require_once "_classes/BD.class.php";

	$bd = new BD();
	$bd->abrir("meubanco", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Orçamento</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="_imagens/icone.png">
	<link rel="stylesheet" href="_css/estilo-tela-novo-orcamento.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<script type="text/javascript" src="_scripts/funcoes.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="_scripts/jquery-3.4.1.min.js"></script>
	<script src="_scripts/jquery.mask.js"></script>

</head>
<body>
<div class="site">
	<i class="fas fa-clipboard fa-4x"></i></i></i><i class="fas fa-plus fa-2x"></i><br><br>
	<fieldset id="campo-item">
	<legend id="legenda">Cadastrar Orçamento</legend>
	<form method="POST" action="_controles/processa-novo-orcamento.php">
		<label for="titulo">Título:</label> <input type="text" id="titulo" name="titulo">
		<label for="prazo" id="label-prazo">Prazo:</label> <input type="text" placeholder="dd/mm/aaaa" id="prazo" name="prazo"><br>
		<label for="texto" id="descricao">Descrição:</label><br><textarea cols="50" rows="4" maxlength="180" placeholder="Digite uma descrição..."></textarea>

		<fieldset id="selecionar-item" class="form-interno"><legend id="legenda-item">Selecionar Item</legend>
			<label>Material:</label><select id="seletor" onchange="preencher()">
				<option>Selecione...</option>

				<?php
					$lista = $bd->listarTodosOsItens();
					while($dado = $lista->fetch(PDO::FETCH_ASSOC)) {?>
						<option><?php echo $dado['material'];?></option>
						<option hidden> <?php echo $dado['id']; ?></option>
				<?php
					} ?>

			</select>
			<label id="label-marca" for="marca">Marca:</label><input type="text" id="marca" name="marca" readonly="true">
			<label id="label-medida" for="medida">Unid. de Medida:</label><input type="text" id="medida" name="medida" readonly="true">
			<label id="label-quant" for="num">Quantidade:</label><input type="number" id="quant" name="quant" min="1"><br>
			<input type="hidden" id="id-item">
			<input class="btn btn-danger" type="button" disabled="true" value="Adicionar" id="botao-inserir" onclick='inserirLinhaTabela()'>
		</fieldset>

		<fieldset id="dados-item" class="form-interno">
		<legend id="legenda-dados-item">Itens</legend>
		<div class="tabela table-responsive">
			<table id="tabela" class="tabela table table-hover">
				<tr>
					<th>Id</th>
					<th>Material</th>
					<th>Marca</th>
					<th>Unid. de Med.</th>
					<th>Quant.</th>
					<th>Excluir</th>
				</tr>
			</table>
		</div>
		<a id="link-itens" href="javascript:redirecionarParaGerenciarItens();" target="_blanck">Gerenciar Itens</a>
		</fieldset>
		<input class="btn btn-success" type="submit" value="Cadastrar" id="botao-cadastrar">
	</form>
	</fieldset>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#prazo').mask('00/00/0000')
		});
		
		function redirecionarParaGerenciarItens() {
        window.open('tela-adm-gerenciar-itens.php', '_blank');
      	}
	</script>
</body>
</html>