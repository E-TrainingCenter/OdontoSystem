<?php

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

	public function Add($descricao, $id_funcionario_responavel, $id_funcionario_aluno) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Treinamento (descricao, id_funcionario_responavel,  id_funcionario_aluno) VALUES (:descricao, :id_funcionario_responavel, :id_funcionario_aluno)");

		if ($stmt->execute()) 
			return true;
		else
			return false; 
	}

	



}


?>