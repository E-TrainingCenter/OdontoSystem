<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");

class Treinamento {

	private $id_treinamento;
	private $descricao;
	private $id_funcionario_responavel;
	private $id_funcionario_aluno;

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setId_funcionario_responsavel($Id_funcionario_responsavel) {
		$this->Id_funcionario_responsavel = $Id_funcionario_responsavel;
	}

	public function getId_funcionario_responsavel(){
		return $this->Id_funcionario_responsavel;
	}

	public function setId_funcionario_aluno($Id_funcionario_aluno) {
		$this->Id_funcionario_aluno = $Id_funcionario_aluno;
	}

	public function getId_funcionario_aluno(){
		return $this->Id_funcionario_aluno;
	}

	public function Add($descricao, $id_responsavel) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Treinamento (descricao, id_responsavel) VALUES (:descricao, :id_responsavel)");
		$stmt->bindParam(":descricao", $descricao);
		$stmt->bindParam(":id_responsavel", $id_responsavel);

		if ($stmt->execute()) 
			return true;
		else
			return false; 
	}

	public function listAll() {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Treinamento");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}
	public function returnTreinamentoById($id_treinamento) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Treinamento WHERE id_treinamento = :id_treinamento");
		$stmt->bindParam(":id_treinamento", $id_treinamento);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results[0];

	}

	public function funcionariosDisponiveis($id_treinamento) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("select funcionario.id_funcionario, funcionario.nome FROM funcionario, grupo, funcionario_grupo WHERE funcionario.id_funcionario not in (SELECT Treinamento_Funcionario.id_funcionario from Treinamento, Treinamento_Funcionario WHERE Treinamento_Funcionario.id_treinamento = Treinamento.id_treinamento and Treinamento.id_treinamento = :id_treinamento) GROUP by nome ");
		$stmt->bindParam(":id_treinamento", $id_treinamento);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

		public function funcionariosIndisponiveis($id_treinamento) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("select funcionario.id_funcionario, funcionario.nome FROM funcionario, Treinamento, Treinamento_Funcionario WHERE funcionario.id_funcionario in (SELECT Treinamento_Funcionario.id_funcionario from Treinamento, Treinamento_Funcionario WHERE Treinamento_Funcionario.id_treinamento = Treinamento.id_treinamento and Treinamento.id_treinamento = :id_treinamento) GROUP by nome ");
		$stmt->bindParam(":id_treinamento", $id_treinamento);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	  public function addFuncionario($id_funcionario, $id_treinamento) {
      	$conn = Banco::connect();

      	$stmt = $conn->prepare("INSERT INTO Treinamento_Funcionario (id_funcionario, id_treinamento) VALUES (:id_funcionario, :id_treinamento)");
      	$stmt->bindParam(":id_funcionario", $id_funcionario);
      	$stmt->bindParam(":id_treinamento", $id_treinamento);

      	if ($stmt->execute())
      		return true;
      	else 
      		return false;
   }

     public function removeFuncionario($id_funcionario, $id_treinamento) {
   		$conn = Banco::connect();

      	$stmt = $conn->prepare("DELETE FROM Treinamento_Funcionario WHERE id_funcionario = :id_funcionario AND id_treinamento = :id_treinamento");
      	$stmt->bindParam(":id_funcionario", $id_funcionario);
      	$stmt->bindParam(":id_treinamento", $id_treinamento);

      	if ($stmt->execute())
      		return true;
      	else 
      		return false;
   }


}


?>