

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

$().ready(function() {
	$('[search]').on('keydown', function(event) {
		if(event.keyCode === 13) {
			search()
		}	
	})	
})

