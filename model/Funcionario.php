<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");

class Funcionario {
	
	private $id_funcionario;
	private $nome;
	private $cpf;
	private $endereco;
	private $id_cargo;
	private $sexo;
	private $senha;
	private $ativo;

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

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha() {

		return $this->senha;
	}

	public function add($nome, $cpf, $endereco, $id_cargo, $sexo, $senha, $ativo) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Funcionario (nome, cpf, endereco, id_cargo, sexo, senha, ativo) VALUES (:nome, :cpf, :endereco, :id_cargo, :sexo, :senha, :ativo)");

		$stmt->bindParam(":nome", $nome); 
		$stmt->bindParam(":cpf", $cpf);
		$stmt->bindParam(":endereco", $endereco);
		$stmt->bindParam(":id_cargo", $id_cargo);
		$stmt->bindParam(":sexo", $sexo);
		$stmt->bindParam(":senha", $senha);
		$stmt->bindParam(":ativo", $ativo);

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

	public static function listAll() {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT id_funcionario, nome FROM Funcionario WHERE ativo = 1");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public static function listInativos() {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT id_funcionario, nome FROM Funcionario WHERE ativo = 0");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function returnIdByNome($nome) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT id_funcionario FROM Funcionario WHERE nome = :nome");
		$stmt->bindParam(":nome", $nome);

		$stmt->execute();
		
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $results[0]['id_funcionario'];
	}

	public function inativar($id_funcionario) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("UPDATE Funcionario SET ativo = 0 WHERE id_funcionario = :id_funcionario");
		$stmt->bindParam(":id_funcionario", $id_funcionario);

		if ($stmt->execute()) 
			return true;
		else 
			return false;
	}

	public function ativar($id_funcionario) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("UPDATE Funcionario SET ativo = 1 WHERE id_funcionario = :id_funcionario");
		$stmt->bindParam(":id_funcionario", $id_funcionario);

		if ($stmt->execute()) 
			return true;
		else 
			return false;
	}

	public function GetFuncionarioById($id_funcionario) {

		$conn = Banco::connect(); 

		$stmt = $conn->prepare("SELECT * FROM Funcionario WHERE id_funcionario = :id_funcionario");
		$stmt->bindParam(":id_funcionario", $id_funcionario);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $results[0];

	}

	public function editar($id_funcionario, $nome, $cpf, $endereco, $id_cargo, $sexo, $senha, $ativo) {

		$conn = Banco::connect(); 

		$stmt = $conn->prepare("UPDATE Funcionario SET nome = :nome , cpf = :cpf , endereco = :endereco , id_cargo = :id_cargo , sexo = :sexo , senha = :senha , ativo = :ativo WHERE id_funcionario = :id_funcionario");
		$stmt->bindParam(":nome", $nome);
		$stmt->bindParam(":cpf", $cpf);
		$stmt->bindParam(":endereco", $endereco);
		$stmt->bindParam(":id_cargo", $id_cargo);
		$stmt->bindParam(":sexo", $sexo);
		$stmt->bindParam(":senha", $senha);
		$stmt->bindParam(":ativo", $ativo);
		$stmt->bindParam(":id_funcionario", $id_funcionario);

		$stmt->execute();


	}



}




?>