/*  Replace all SVG images with inline SVG */
$().ready( function() {
	$('img.svg').each(function(){
		var $img = $(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

	$.get(imgURL, function(data) {
		// Get the SVG tag, ignore the rest
		var $svg = $(data).find('svg');
		// Add replaced image's ID to the new SVG
		if (typeof imgID !== 'undefined') {
			$svg = $svg.attr('id', imgID);
		}
		// Add replaced image's classes to the new SVG
		if (typeof imgClass !== 'undefined') {
			$svg = $svg.attr('class', imgClass+' replaced-svg');
		}
		// Remove any invalid XML tags as per http://validator.w3.org
		$svg = $svg.removeAttr('xmlns:a');
		// Replace image with new SVG
		$img.replaceWith($svg);
		});
	});

})

/**
 * Variáveis Globais
 */ 
let baseURL = '_controles/'

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

// ----------------------------------------- NOVO ---------------------------------------------

// Retorna Ano Atual
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

	if ( !!modal.querySelector('input') )
		modal.querySelector('input').focus()
}

function editItem(idItem, idModal, category) {
	let modal = $(`#${idModal}`)
	let inputs = modal.find('input')
	
	//Busca Item baseado no Id
	$.getJSON(`${baseURL}get-dados.php`, { category: 'Item', id: idItem } ).done( function(data) {
		console.log(data)
		Object.values(data).forEach((el, index) => {
			inputs[index].value = el
		})

		return true
	})

	popup(idModal)

	//Atualiza Item
	$('#pop_form_editar').submit( function() {
		var dados = $(this).serialize()
		dados += '&acao=Editar&category=Item'

		$.post( `${baseURL}processa-acoes-itens.php`, dados ).done( function() {
			$('#pop_form').each( function(){
				this.reset()
			})

			modal.css('display', 'none')			
			updateTable()
			return true
		})

		return false
	})

}

// Deletar Item
function deleteItem(idItem, idModal) {
	popup(idModal)
	let confirmar = $(`#${idModal}`).find('[confirmar]')

	confirmar.click( function() {
		$.get(`${baseURL}processa-acoes-itens.php`, { acao: 'Apagar', id: idItem } ).done( function() {
			confirmar.closest('.modal').css('display', 'none')			
			updateTable()
			return true
		})

		return false
	})	
}

// Cadastro de Item
$().ready( function() {
	$('#pop_form').submit( function() {
		let dados = $(this).serialize()

		$.post( `${baseURL}processa-cadastro-item.php`, dados ).done( function() {
			$('#pop_form').each( function(){
				this.reset()
			})

			$('#enviar').closest('.modal').css('display', 'none')
			updateTable()
			return true
		})
		
		return false
	})
})

function createTable(content, obj, collumns) {
	this.obj = obj
	this.collumns = collumns
	this.content = document.getElementsByClassName(content)
	this.table = document.querySelector("table") ? document.querySelector("table") : document.createElement("table")
	this.thead = document.querySelector("thead") ? document.querySelector("thead") : document.createElement("thead")
	this.tbody = document.querySelector("tbody") ? document.querySelector("tbody") : document.createElement("tbody")
	
	this.content[0].appendChild(this.table)
	this.table.innerHTML = ''
	this.thead.innerHTML = ''
	this.tbody.innerHTML = ''

	this.table.appendChild(this.thead)
	this.table.appendChild(this.tbody)

	if(this.obj.length == 0) {
		this.tbody.innerHTML = `<div class="message-no-data">
									<i class="icofont-search-document icofont-4x"></i>
									<h3>Nenhum dado foi retornado...</h3>
								</div>`
		return
	}

	let cabecalho = ''
	let corpo = ''
	
	if ( this.collumns.length == Object.keys(this.obj[0]).length ) {
		this.collumns.forEach((e) => {
			cabecalho += '<th>' + e + '</th>'
		})
	} else { 
		Object.keys(obj[0]).forEach((e) => {
			cabecalho += '<th>' + e + '</th>'
		})
	}

	cabecalho += '<th>Ações</th>'
	this.thead.innerHTML += cabecalho
	this.thead.innerHTML += '</tr>'

	this.obj.forEach((e) => {
		Object.values(e).forEach((el) => {
			corpo += '<td>' + el + '</td>'
		})

		corpo += `<td>
					<a onclick='deleteItem("${e.id}","modalExcluir")' title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a> | <a onclick='editItem("${e.id}","modalEditar")' title="Editar" class="bnt"><i id="lapis" class="icofont-pencil-alt-5"></i></a>
				  </td>`		
		corpo += '</tr>'
	})

	this.tbody.innerHTML += corpo
}

function updateTable(query='') {
	$.getJSON(`${baseURL}get-dados.php`, { query: query } ).done( function(data) {
		createTable("tabela", data, ["ID", "Material", "Marca", "Medida"]);

		return true
	})
	
	return false
}

function search() {
	let pesquisaTexto = document.querySelector('[search]').value
	updateTable(pesquisaTexto)
}

$().ready(function() {
	$('[search]').on('keydown', function(event) {
		if(event.keyCode === 13) {
			search()
		}	
	})	
})

updateTable()