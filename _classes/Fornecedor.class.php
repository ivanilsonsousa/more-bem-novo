<?php

	class Fornecedor {
		private $idforn;
		private $rsocial;
		private $cnpj;
		private $rua;
		private $num;
		private $cep;
		private $tel;
		private $email;
		private $senha;

		function __construct($rsocial, $cnpj, $rua, $num, $cep, $tel, $email, $senha) {
			$this->setRazaoSocial($rsocial);
			$this->setCNPJ($cnpj);
			$this->setRua($rua);
			$this->setNum($num);
			$this->setCEP($cep);
			$this->setTel($tel);
			$this->setEmail($email);
			$this->setSenha($senha);
		}

		public function getRazaoSocial() {
			return $this->rsocial;
		}

		public function setRazaoSocial($rsocial) {
			$this->rsocial = $rsocial;
		}

		public function getIdForn() {
			return $this->idforn;
		}

		public function setIdForn($idforn) {
			$this->idforn = $idforn;
		}

		public function getCNPJ() {
			return $this->cnpj;
		}

		public function setCNPJ($cnpj) {
			$this->cnpj = $cnpj;
		}

		
		public function getRua() {
			return $this->rua;
		}

		public function setRua($rua) {
			$this->rua = $rua;
		}	

		public function getNum() {
			return $this->num;
		}

		public function setNum($num) {
			$this->num = $num;
		}	

		public function getCEP() {
			return $this->cep;
		}

		public function setCEP($cep) {
			$this->cep = $cep;
		}

		public function getTel() {
			return $this->tel;
		}

		public function setTel($tel) {
			$this->tel = $tel;
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