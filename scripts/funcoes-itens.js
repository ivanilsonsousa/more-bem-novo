/**
 * Variáveis Globais
 */ 
let baseURL = '_controles/'
let category = 'Item'
let columns = ["ID", "Material", "Marca", "Medida"]
let content = 'tabela'

//Editar Item
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

function updateTable(query='') {
	$.getJSON(`${baseURL}get-dados.php`, { query: query } ).done( function(data) {
    new TObjectToTable("tabela", data, columns)

		return true
	})
	
	return false
}

updateTable()

//descontinuada
function createTable(content, obj, collumns) {
	// this.obj = obj
	// this.collumns = collumns
	// this.content = document.getElementsByClassName(content)
	// this.table = document.querySelector("table") ? document.querySelector("table") : document.createElement("table")
	// this.thead = document.querySelector("thead") ? document.querySelector("thead") : document.createElement("thead")
	// this.tbody = document.querySelector("tbody") ? document.querySelector("tbody") : document.createElement("tbody")
	
	// this.content[0].appendChild(this.table)
	// this.table.innerHTML = ''
	// this.thead.innerHTML = ''
	// this.tbody.innerHTML = ''

	// this.table.appendChild(this.thead)
	// this.table.appendChild(this.tbody)

	// if(this.obj.length == 0) {
	// 	this.tbody.innerHTML = `<div class="message-no-data">
	// 								<i class="icofont-search-document icofont-4x"></i>
	// 								<h3>Nenhum dado foi retornado...</h3>
	// 							</div>`
	// 	return
	// }

	// let cabecalho = ''
	// let corpo = ''
	
	// if ( this.collumns.length == Object.keys(this.obj[0]).length ) {
	// 	this.collumns.forEach((e) => {
	// 		cabecalho += '<th>' + e + '</th>'
	// 	})
	// } else { 
	// 	Object.keys(obj[0]).forEach((e) => {
	// 		cabecalho += '<th>' + e + '</th>'
	// 	})
	// }

	// cabecalho += '<th>Ações</th>'
	// this.thead.innerHTML += cabecalho
	// this.thead.innerHTML += '</tr>'

	// this.obj.forEach((e) => {
	// 	Object.values(e).forEach((el) => {
	// 		corpo += '<td>' + el + '</td>'
	// 	})

	// 	corpo += `<td>
	// 				<a onclick='deleteItem("${e.id}","modalExcluir")' title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a> | <a onclick='editItem("${e.id}","modalEditar")' title="Editar" class="bnt"><i id="lapis" class="icofont-pencil-alt-5"></i></a>
	// 			  </td>`		
	// 	corpo += '</tr>'
	// })

	// this.tbody.innerHTML += corpo
}
