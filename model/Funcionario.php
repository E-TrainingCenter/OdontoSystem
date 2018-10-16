<?php

require_once("../config/DB/Banco.php");

class Funcionario {
	
	private $id_funcionario;
	private $nome;
	private $cpf;
	private $endereco;
	private $id_cargo;
	private $sexo;
	private $senha;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome() {

		return $this->nome;
	}

		public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf() {

		return $this->cpf;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getEndereco() {

		return $this->endereco;
	}

		public function setId_cargo($id_cargo){
		$this->id_cargo = $id_cargo;
	}

	public function getId_cargo() {

		return $this->id_cargo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo() {

		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo() {

		return $this->sexo;
	}

	public function add($nome, $cpf, $endereco, $id_cargo, $sexo) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Funcionario (nome, cpf, endereco, id_cargo, sexo) VALUES (:nome, :cpf, :endereco, :id_cargo, :sexo)");

		$stmt->bindParam(":nome", $nome); 
		$stmt->bindParam(":cpf", $cpf);
		$stmt->bindParam(":endereco", $endereco);
		$stmt->bindParam(":id_cargo", $id_cargo);
		$stmt->bindParam(":sexo", $sexo);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function login($nome, $senha) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Funcionario WHERE nome = :nome AND senha = :senha");

		$stmt->bindParam(":nome", $nome);
		$stmt->bindParam(":senha", $senha);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		

		if (count($results) == 0) {
			throw new Exception("Usuario ou senha incorretos!", 1);
		}
		else 
			return true;	

	}

	public function listAll() {

		$conn Banco::connect();

		$stmt = $conn->prepare("SELECT nome FROM Funcionario");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}




}




?>