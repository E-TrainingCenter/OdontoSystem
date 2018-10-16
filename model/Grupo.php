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

	


}


?>