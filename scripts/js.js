// Retorna Ano Atual
function ano(){
	return new Date().getFullYear()
}

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

//Monitora a pesquisa no input
$().ready(function() {
	$('[search]').on('keydown', function(event) {
		if(event.keyCode === 13) {
			search()
		}	
	})	
})

class TObjectToTable {
	constructor( content, obj, collumns ){
    this.obj = obj
    this.collumns = collumns
    this.content = document.getElementsByClassName(content)
    
    this.initTable()
	}
  
	initTable(){
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

    this.cabecalho = ''
    this.corpo = ''
    
    if ( this.collumns.length == Object.keys(this.obj[0]).length ) {
      this.collumns.forEach((e) => {
        this.cabecalho += '<th>' + e + '</th>'
      })
    } else { 
      Object.keys(this.obj[0]).forEach((e) => {
        this.cabecalho += '<th>' + e + '</th>'
      })
    }

    this.cabecalho += '<th>Ações</th>'
    this.thead.innerHTML += this.cabecalho
    this.thead.innerHTML += '</tr>'

    this.obj.forEach((e) => {
      Object.values(e).forEach((el) => {
        this.corpo += '<td>' + el + '</td>'
      })

      this.corpo += `<td>
                      <a onclick='deleteItem("${e.id}","modalExcluir")' title="Apagar" class="bnt"><i id="lixo" class="icofont-trash"></i></a> | <a onclick='editItem("${e.id}","modalEditar")' title="Editar" class="bnt"><i id="lapis" class="icofont-pencil-alt-5"></i></a>
                    </td>`		
      this.corpo += '</tr>'
    })

    this.tbody.innerHTML += this.corpo
  }
  
}
