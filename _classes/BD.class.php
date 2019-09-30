<?php
require_once "Fornecedor.class.php";
require_once "Usuario.class.php";
require_once "Item.class.php";

class BD {
	private $pdo;
	public $msgErro = "";

	public function abrir($nome, $host, $usuario, $senha){
		global $pdo;
		global $msgErro;

		$dsn = "mysql:host=$host;dbname=$nome;charset=utf8";

		try {
			$pdo = new PDO($dsn, $usuario, $senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function verificaExistencia($email){
		global $pdo;

		$sql = $pdo->prepare("SELECT idforn FROM fornecedor WHERE email = :e");
		$sql->bindValue(":e", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true; //ja cadastrado
		} else {
			return false; //pode cadastrar
		}
	}

	public function inserirUsuario($u){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("INSERT INTO usuario (nome, cpf, tipo, email, senha) VALUES (:n, :cp, :t, :e, :s)");
			$sql->bindValue(":n", $u->getNome());
			$sql->bindValue(":cp", $u->getCPF());
			$sql->bindValue(":t", $u->getTipo());
			$sql->bindValue(":e", $u->getEmail());
			$sql->bindValue(":s", md5($u->getSenha()));
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
			//echo "ERRRRRRRRRO <br>".$msgErro;
		}
	}

	public function listarTodosOsUsuarios(){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM usuario ORDER BY id ASC");
			$sql->execute();
			return $sql;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function listarUsuario($id){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM usuario WHERE id = $id");
			$sql->execute();
			$dado = $sql->fetch(PDO::FETCH_ASSOC);
			return $dado;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function editarUsuario($u){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("UPDATE usuario SET nome = :n, cpf = :cp, tipo = :t, email = :e, senha = :s WHERE id = :id");
			$sql->bindValue(":n", $u->getNome());
			$sql->bindValue(":cp", $u->geCPF());
			$sql->bindValue(":t", $u->geTipo());
			$sql->bindValue(":e", $f->getEmail());
			$sql->bindValue(":s", md5($f->getSenha()));

			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function inserirForncedor($f){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("INSERT INTO fornecedor (rsocial, cnpj, rua, num, cep, tel, email, senha) VALUES (:rs, :cn, :r, :n, :ce, :t, :e, :s)");
			$sql->bindValue(":rs", $f->getRazaoSocial());
			$sql->bindValue(":cn", $f->getCNPJ());
			$sql->bindValue(":r", $f->getRua());
			$sql->bindValue(":n", $f->getNum());
			$sql->bindValue(":ce", $f->getCEP());
			$sql->bindValue(":t", $f->getTel());
			$sql->bindValue(":e", $f->getEmail());
			$sql->bindValue(":s", md5($f->getSenha()));
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function apagarFornecedor($id){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("DELETE FROM fornecedor WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function listarTodosOsFornecedores(){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM fornecedor ORDER BY id ASC");
			$sql->execute();
			return $sql;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function listarFornecedor($id){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM fornecedor WHERE id = $id");
			$sql->execute();
			$dado = $sql->fetch(PDO::FETCH_ASSOC);
			return $dado;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function editarFornecedor($f){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("UPDATE fornecedor SET rsocial = :rs, cnpj = :cn, rua = :r, num = :n, cep = :ce, tel = :t, email = :e, senha = :s WHERE id = :id");

			$sql->bindValue(":rs", $f->getRazaoSocial());
			$sql->bindValue(":cn", $f->getCNPJ());
			$sql->bindValue(":r", $f->getRua());
			$sql->bindValue(":n", $f->getNum());
			$sql->bindValue(":ce", $f->getCEP());
			$sql->bindValue(":t", $f->getTel());
			$sql->bindValue(":e", $f->getEmail());
			$sql->bindValue(":s", md5($f->getSenha()));
			$sql->bindValue(":id", $f->getIdForn());

			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function inserirItem($i){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("INSERT INTO item (material, marca, medida) VALUES (:mat, :mar, :med)");
			$sql->bindValue(":mat", $i->getMaterial());
			$sql->bindValue(":mar", $i->getMarca());
			$sql->bindValue(":med", $i->getMedida());
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function editarItem($i){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("UPDATE item SET material = :mat, marca = :mar, medida = :med WHERE id = :id");
			$sql->bindValue(":mat", $i->getMaterial());
			$sql->bindValue(":mar", $i->getMarca());
			$sql->bindValue(":med", $i->getMedida());
			$sql->bindValue(":id", $i->getId());
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function apagarItem($id){
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("DELETE FROM item WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function listarTodosOsItens() {
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM item ORDER BY id DESC");
			$sql->execute();
			return $sql;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function listarItem($indice) {
		global $pdo;
		global $msgErro;

		try {
			$sql = $pdo->prepare("SELECT * FROM item WHERE id = :id");
			$sql->bindValue(":id", $indice);
			$sql->execute();
			$dado = $sql->fetch(PDO::FETCH_ASSOC);
			return $dado;

		} catch (Exception $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function logar($email, $senha) {
		global $pdo;
		//verificar se o email e senha estao cadastrados, se sim
		$sql = $pdo->prepare("SELECT id FROM fornecedor WHERE email = :e AND senha = :s");
		$sql->bindValue(":e", $email);
		$sql->bindValue(":s", md5($senha));
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id'] = $dado['id'];
			return true; //conseguiu logar
		} else {
			return false; //nao foi possivel logar
		}
	}
}
