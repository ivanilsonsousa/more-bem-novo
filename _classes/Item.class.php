<?php
	
	class Item {
		private $id;
		private $material;
		private $marca;
		private $medida;

		function __construct($material, $marca, $medida) {
			$this->setMaterial($material);
			$this->setMarca($marca);
			$this->setMedida($medida);
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getMaterial() {
			return $this->material;
		}

		public function setMaterial($material) {
			$this->material = $material;
		}

		public function getMarca() {
			return $this->marca;
		}

		public function setMarca($marca) {
			$this->marca = $marca;
		}

		public function getMedida() {
			return $this->medida;
		}

		public function setMedida($medida) {
			$this->medida = $medida;
		}
	}