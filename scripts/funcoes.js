/**
 * Essa função pega o item selecionado no momento
 * da criação de um novo Orçamento no evento de
 * clique do elemento <select> dentro do fieldset
 */
function preencher(){
	let sel = document.getElementById('seletor')
	let indice = sel.options[sel.selectedIndex + 1].text

	if (sel.selectedIndex) {
		document.getElementById('botao-inserir').disabled = false
		document.getElementById('quant').value = '1'
	} else {
		document.getElementById('botao-inserir').disabled = true
		document.getElementById('quant').value = ''
	}

    $.ajax({
		type: 'POST',
		dataType: 'html',
		url: 'acoes.php',
		data: { 'indice' : indice },
		cache: false,

		success: function(data){
			var aux = data.split('&')
			document.getElementById('id-item').value = aux[0]
			document.getElementById('marca').value = aux[1]
			document.getElementById('medida').value = aux[2]
		},
		error: function(data)
		{
			console.log(data)
		}
	});
}

/**
 * Essa função exibe o texto da tela de login do campo senha ao clicar no icone de olho.
 */
function mostrarTexto(){
	if (document.getElementById('senha').type == 'password') {
		document.getElementById('senha').type = 'text'
		let img = document.getElementById('olho')
		img.src = 'images/eye-slash-regular.svg'
	} else {
		document.getElementById('senha').type = 'password'
		let img = document.getElementById('olho')
		img.src = 'images/eye-regular.svg'
	}
}

function inserirLinhaTabela() {
	// Responsavel por pegar o valor selecionado no <select>
	let sel = document.getElementById('seletor')
	// Captura o texto do item selecionado no <select>
	let material = sel.options[sel.selectedIndex].text
	// Captura a referência da tabela com id “tabela”
	let table = document.getElementById('tabela')
	// Captura a quantidade de linhas já existentes na tabela
	let numOfRows = table.rows.length
	// Captura a quantidade de colunas da última linha da tabela
	let numOfCols = table.rows[numOfRows-1].cells.length
	// Insere uma linha no fim da tabela.
	let newRow = table.insertRow(numOfRows)

	newCellId = newRow.insertCell(0)
	newCellMaterial = newRow.insertCell(1)
	newCellMarca = newRow.insertCell(2)
	newCellMedida = newRow.insertCell(3)
	newCellQuantidade = newRow.insertCell(4)
	newCellApagar = newRow.insertCell(5)
	// Insere um conteúdo na coluna
	newCellId.innerHTML = document.getElementById('id-item').value
	newCellMaterial.innerHTML = material
	newCellMarca.innerHTML = document.getElementById('marca').value
	newCellMedida.innerHTML = document.getElementById('medida').value
	newCellQuantidade.innerHTML = document.getElementById('quant').value
	newCellApagar.innerHTML = "<a title='Apagar' id='botao-apagar' onclick='removerLinha(this)' class 'bnt'><i class='far fa-times-circle'></i></a>"

	sel.options[sel.selectedIndex].disabled = true
	sel.options[0].selected = true
	document.getElementById('botao-inserir').disabled = true
	document.getElementById('quant').value = ''
	document.getElementById('medida').value = ''
	document.getElementById('marca').value = ''
}

/**
 * Função responsável em receber um objeto e extrair
 * as informações necessárias para a remoção da linha.
 */ 
function removerLinha(obj) {
	// Capturamos a referência da TR (linha) pai do objeto
	let objTR = obj.parentNode.parentNode
	// Capturamos a referência da TABLE (tabela) pai da linha
	let objTable = objTR.parentNode
	// Capturamos o índice da linha
	let indexTR = objTR.rowIndex
	
	// Captura o texto contido na linha clicada na coluna de material
	let coluna = objTR.getElementsByTagName('td');
	let materialTexto = coluna[1].firstChild.nodeValue
	abilitarOption(materialTexto)

	// Chamamos o método de remoção de linha nativo do JavaScript, passando como parâmetro o índice da linha
	objTable.deleteRow(indexTR)
}

function abilitarOption(opcao){
	let sel = document.getElementById('seletor')
	for (let i = 1; i < sel.length; i++) {
		console.log(i) //Descobrir pq i+2 nao funciona
		if (sel.options[i].value == opcao) {
			sel.options[i].disabled = false
			break
	 	}
		i++
	}
}

function ano(){
	return new Date().getFullYear()
}

// Janela Modal
function popup(idModal) {
	let modal = document.getElementById(idModal)
	let exit = modal.querySelector('[sair]')
	let cancel = modal.querySelector('[cancelar]')
	
	modal.style.display = 'block'
	exit.onclick = () => modal.style.display = 'none'
	cancel.onclick = () => modal.style.display = 'none'
	window.onclick = (e) => { if (e.target == modal) modal.style.display = 'none' }
}

function editarItem(idItem, idModal) {
	let modal = document.querySelector(`#${idModal}`)
	let inputs = modal.querySelectorAll('input')
	
	$.ajax({
		type: "GET",
		url: "_controles/get-dados.php?category=Item&id=" + idItem,
		data: {},
		success: function(data) {
			let item = JSON.parse(data)
			inputs[0].value = item.material
			inputs[1].value = item.marca
			inputs[2].value = item.medida
			inputs[3].value = item.id
			
			return true
		}
	});
	
	popup(idModal)	
	let confirmar = modal.querySelector('#enviar')
	
	confirmar.onclick = () => {
		$('#pop_form_editar').submit(function() {
			var dados = $(this).serialize();
			dados += '&acao=Editar'
			$.ajax({
				type: 'POST',
				url: '_controles/processa-acoes-itens.php',
				data: dados,
				success: function(data) {
					window.location.reload()
					return true
				}
			});
			
			return false
		});

	}
}

function excluirItem(idItem, idModal) {
	console.log(idItem)
	popup(idModal)
	let confirmar = document.querySelector(`div[id=${idModal}] > .modal-content > .modal-footer > [confirmar]`)
	
	confirmar.onclick = () => {
		$.ajax({
			type: "GET",
			url: "_controles/processa-acoes-itens.php?acao=Apagar&id=" + idItem,
			data: {},
			success: function(data) {
				window.location.reload()
				return true
			}
		});
		
		return false
	}
}

// Cadastro de Itens Ajax
$().ready(function() {
	$('#enviar').on('click', function(){
		$('#pop_form').submit(function() {
			var dados = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "_controles/processa-cadastro-item.php",
				data: dados,
				success: function(data) {
					window.location.reload()
					return true
				}
			});
			
			return false
		});
	})
});

class TObjectToTable {
	constructor( content, obj, collumns ){
		this.obj = obj;
		this.content = document.getElementsByClassName(content);
		this.collumns = collumns;
		this.table = document.createElement("table");
		this.thead = document.createElement("thead");
		this.tbody = document.createElement("tbody");

		// get Collumns
		this.initTable();
	}

	initTable(){
		console.log(this.content);
		this.content[0].appendChild(this.table)
		this.table.innerHTML = '';

		this.table.appendChild(this.thead)
		this.table.appendChild(this.tbody)
		let cabecalho = ''
		let corpo = ''
		
		if (this.collumns != undefined) {
			for (const value of this.collumns) {
				cabecalho += '<th>' + value + '</th>';
			}
			cabecalho += '<th>Ações</th>';
			this.thead.innerHTML += cabecalho;
			this.thead.innerHTML += '</tr>';
		}

		this.obj.map((e) => {
			corpo += '<tr>'
			corpo += '<td>' + e.id + '</td>';
			corpo += '<td>' + e.material + '</td>';
			corpo += '<td>' + e.marca + '</td>';
			corpo += '<td>' + e.medida + '</td>';
			corpo += `<td>
						<a onclick="excluirItem("${e.id}","modalExcluir') title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a> | <a onclick='editarItem("${e.id}","modalEditar")' title="Editar" class="bnt"><i id="lapis" class="icofont-pencil-alt-5"></i></a>
					  </td>`

			corpo += '</tr>'
		})
		console.log(corpo)

		this.tbody.innerHTML += corpo;

	}
}

function callback(data) {
	montaTabela(data)
}

function montaTabela(dados) {
	// console.log(dados)

	
	// let tbody = document.querySelector('tbody')
	
	// let qtdLinhas = tabela.rows.length
	// let qdtColunas = tabela.rows[qtdLinhas-1].cells.length
	// let novaLinha = tabela.insertRow(qtdLinhas)
	
	// dados.map((e)=>{
		// 	console.log(e)
		
		// 	tbody.innerHTML += '<tr>';
		
		// 	Object.keys( obj[0] ).forEach( function( text ){
			// 		tbody.innerHTML += '<td>' + obj[i][text] + '</td>';
			// 	});
			
			// 	tbody.innerHTML += '</tr>';
			// })
			

	// for( var i in obj ){
	// 	Object.keys( obj[0] ).forEach( function( text ){
	// 		tbody.innerHTML += '<td>' + obj[i][text] + '</td>';
	// 	});
	// }
}

function pesquisaItens(query) {
	$.ajax({
		type: "POST",
		url: "_controles/get-dados.php?query=" + query,
		data: {},
		success: function(data) {
			new TObjectToTable("tabela", JSON.parse(data), ["ID", "Material", "Marca", "Medida"]);
		},
		error: function(data) {
			alert(data)
		}
	});
	
	return true
}
