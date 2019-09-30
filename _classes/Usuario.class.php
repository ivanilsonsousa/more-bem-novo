<?php

	class Usuario {
		private $id;
		private $nome;
		private $cpf;
		private $tipo;
		private $email;
		private $senha;

		function __construct($nome, $cpf, $tipo, $email, $senha) {
			$this->setNome($nome);
			$this->setCPF($cpf);
			$this->setTipo($tipo);
			$this->setEmail($email);
			$this->setSenha($senha);
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getTipo() {
			return $this->tipo;
		}

		public function setTipo($tipo) {
			$this->tipo = $tipo;
		}

		public function getCPF() {
			return $this->cpf;
		}

		public function setCPF($cpf) {
			$this->cpf = $cpf;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function getSenha() {
			return $this->senha;
		}

		public function setSenha($senha) {
			$this->senha = $senha;
		}
	}