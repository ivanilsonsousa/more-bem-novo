/* --- Descrição da função preenche() ---
	Essa função pega o item selecionado no momento
	da criação de um novo Orçamento no evento de
	clique do elemento <select> dentro do fieldset
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

/*--- Descrição da função mostrarTexto() ---
	Essa função exibe o texto da tela de login do campo senha ao clicar no icone de olho.
*/
function mostrarTexto(){
	if (document.getElementById('senha').type == 'password') {
		document.getElementById('senha').type = 'text'
		let img = document.getElementById('olho')
		img.src = '_imagens/eye-slash-regular.svg'
	} else {
		document.getElementById('senha').type = 'password'
		let img = document.getElementById('olho')
		img.src = '_imagens/eye-regular.svg'
	}
}

// function adicionarItem() {
// 	let sel = document.getElementById("seletor")
// 	if(sel.selectedIndex) {
// 		inserirLinhaTabela()
// 	}
// }

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

// Função responsável em receber um objeto e extrair as informações necessárias para a remoção da linha.
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

function sair(){
    if (confirm("Deseja realmente sair?")){
        location.href = "_controles/sair.php";
    } 
}

function confirmarApagarItem(id){
	if(confirm("Deseja realmente apagar esse item?")){
		location.href = "_controles/processa-acoes-itens.php?acao=Apagar&id="+id 
	}
}

function confirmarApagarFornecedor(id){
	if(confirm("Deseja realmente apagar esse Fornecedor?")){
		location.href = "_controles/processa-acoes-fornecedores.php?acao=Apagar&id="+id 
	}
}

function verificaApagar(item){
	alert(item)
    // if (confirm("Deseja realmente Apagar Esse Item?")){
    //     //location.href="_controles/sair.php";
    //     url = "_controles/processa-acoes-itens.php?acao=Apagar&id="+item
    //     location.href= url
    // } 
}

function ano(){
	now = new Date()
	return now.getFullYear()
}

function pop(){
	$('#pop').addClass('pop-on')
	$('#pop').css({height: $(document).height()})
	
	$('#pop').on('click', function(){
		$('#pop').removeClass('pop-on')
	})
}

// POPS
// Get the modal
var modal = document.getElementById("myModal")
var btn = document.getElementById("myBtn")
var cancel = document.getElementById("cancel")

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0]

// When the user clicks the button, open the modal 
btn.onclick = () => modal.style.display = "block"
cancel.onclick = () => modal.style.display = "block"

// When the user clicks on <span> (x), close the modal
span.onclick = () => modal.style.display = "none"
cancel.onclick = () => modal.style.display = "none"

// When the user clicks anywhere outside of the modal, close it
window.onclick = (e) => { if (e.target == modal) modal.style.display = "none" }

// FIM POPS

// ajax pop

$().ready(function() {
	$('#enviar').on('click', function(){
		$('#pop_form').submit(function() {
			var dados = $(this).serialize();
			console.log($(this))
			$.ajax({
				type: "POST",
				url: "_controles/processa-cadastro-item.php",
				data: dados,
				success: function(data) {
					modal.style.display = "none"
					window.location.reload()
					return true;
				}
			});
			
			return false;
		});
	})
});

// Modal Sair
var closeSair = document.getElementById("closeSair")
var btnSair = document.getElementById("btnSair")
var cancelSair = document.getElementById("cancelSair")
var modalSair = document.getElementById("modalSair")

closeSair.onclick = () => modalSair.style.display = "none"	
btnSair.onclick = () => modalSair.style.display = "block"
cancelSair.onclick = () => modalSair.style.display = "none"
modalSair.onclick = (e) => modalSair.style.display = "none"