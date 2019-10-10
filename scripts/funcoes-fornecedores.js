/**
 * Variáveis Globais
 */ 
let baseURL = '_controles/'
let category = 'Fornecedor'
let columns = ["ID", "Razão Social", "CNPJ", "Tel", "Email"]
let content = 'tabela'
let query = ''

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
					<a onclick='deleteItem("${e.id}","modalExcluir")' title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a>
				  </td>`		
		corpo += '</tr>'
	})

	this.tbody.innerHTML += corpo
}

function updateTable(query='', category=category) {
	$.getJSON(`${baseURL}get-dados.php`, { query: query, category: category } ).done( function(data) {
        createTable(content, data, columns);

		return true
	})
	
	return false
}

// Deletar Item
function deleteItem(idItem, idModal) {
	popup(idModal)
	let confirmar = $(`#${idModal}`).find('[confirmar]')

	confirmar.click( function() {
		$.get(`${baseURL}processa-acoes-fornecedores.php`, { acao: 'Apagar', id: idItem } ).done( function() {
			confirmar.closest('.modal').css('display', 'none')			

			updateTable(query, category)            
            return true
		})

		return false
	})	
}

function search() {
	let pesquisaTexto = document.querySelector('[search]').value
	updateTable(pesquisaTexto, category)
}

updateTable(query, category)