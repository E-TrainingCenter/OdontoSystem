<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");

class Grupo {

	private $id_grupo;
	private $descricao;
	private $ativo;

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function Add($descricao, $ativo) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Grupo (descricao, ativo) VALUES (:descricao, :ativo)");

		$stmt->bindParam(":descricao", $descricao);
		$stmt->bindParam(":ativo", $ativo);

		if ($stmt->execute()) {
 			return true;
		}
		else 
			return false;

	}

	public function AddFuncionarioToGrupo($id_funcionario, $id_grupo) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Grupo_Funcionario (id_funcionario, id_grupo) VALUES (:id_funcionario, id_grupo)");

		if ($stmt-execute()) 
			return true;
		else
		 	return false;
	}

	public function listAll() {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Grupo WHERE ativo = 1");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}


	public function inativar($id_grupo) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("UPDATE Grupo SET ativo = 0 WHERE id_grupo = :id_grupo");
		$stmt->bindParam(":id_grupo", $id_grupo);

		if ($stmt->execute()) 
			return true;
		else 
			return false;
	}

	public function funcionariosDisponiveis($id_grupo) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("select funcionario.id_funcionario, funcionario.nome FROM funcionario, grupo, funcionario_grupo WHERE funcionario.id_funcionario not in (SELECT funcionario_grupo.id_funcionario from grupo, funcionario_grupo WHERE funcionario_grupo.id_grupo = grupo.id_grupo and grupo.id_grupo = :id_grupo) GROUP by nome ");
		$stmt->bindParam(":id_grupo", $id_grupo);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	public function funcionariosIndisponiveis($id_grupo) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("select funcionario.id_funcionario, funcionario.nome FROM funcionario, grupo, funcionario_grupo WHERE funcionario.id_funcionario in (SELECT funcionario_grupo.id_funcionario from grupo, funcionario_grupo WHERE funcionario_grupo.id_grupo = grupo.id_grupo and grupo.id_grupo = :id_grupo) GROUP by nome ");
		$stmt->bindParam(":id_grupo", $id_grupo);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	public function returnGrupoById($id_grupo) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Grupo WHERE id_grupo = :id_grupo");
		$stmt->bindParam(":id_grupo", $id_grupo);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results[0];
	}
	
	  public function addFuncionario($id_funcionario, $id_grupo) {
      	$conn = Banco::connect();

      	$stmt = $conn->prepare("INSERT INTO Funcionario_Grupo (id_funcionario, id_grupo) VALUES (:id_funcionario, :id_grupo)");
      	$stmt->bindParam(":id_funcionario", $id_funcionario);
      	$stmt->bindParam(":id_grupo", $id_grupo);

      	if ($stmt->execute())
      		return true;
      	else 
      		return false;
   }

   public function removeFuncionario($id_funcionario, $id_grupo) {
   		$conn = Banco::connect();

      	$stmt = $conn->prepare("DELETE FROM Funcionario_Grupo WHERE id_funcionario = :id_funcionario AND id_grupo = :id_grupo");
      	$stmt->bindParam(":id_funcionario", $id_funcionario);
      	$stmt->bindParam(":id_grupo", $id_grupo);

      	if ($stmt->execute())
      		return true;
      	else 
      		return false;
   }



}


?>