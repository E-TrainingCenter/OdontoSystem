<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");


class Mensagem {

	private $id_mensagem;
	private $mensagem;
	private $data;
	private $id_funcionario_remetente;
	private $id_funcionario_destinatario;
	private $excluido;
	private $assunto;
	private $visualizado;

	public function getId_mensagem() {

		return $this->id_mensagem;
	}

	public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	} 

	public function getMensagem() {

		return $this->mensagem;
	}

	public function setData($data) {
		$this->data = $data;
	} 

	public function getData() {

		return $this->data;
	}

	public function setId_funcionario_remetente($id_funcionario_remetente) {
		$this->id_funcionario_remetente = $id_funcionario_remetente;
	} 

	public function getId_funcionario_remetente() {

		return $this->id_funcionario_remetente;
	}

	public function setId_funcionario_destinatario($id_funcionario_destinatario) {
		$this->id_funcionario_destinatario = $id_funcionario_destinatario;
	} 

	public function getId_funcionario_destinatario() {

		return $this->id_funcionario_destinatario;
	}

	public function setExcluido($excluido) {
		$this->excluido = $excluido;
	} 

	public function getExcluido() {

		return $this->excluido;
	}

	public function setAssunto($assunto) {
		$this->assunto = $assunto;
	} 

	public function getAssunto() {

		return $this->assunto;
	}

	public function setVisualizado($visualizado) {
		$this->visualizado = $visualizado;
	} 

	public function getVisualizado() {

		return $this->visualizado;
	}

	public function listAll($id_funcionario_destinatario) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Mensagem WHERE excluido = 0 and id_funcionario_destinatario = :id_funcionario_destinatario");
		$stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	public function EnviaMensagem($mensagem, $data, $id_funcionario_remetente, $id_funcionario_destinatario, $excluido, $assunto, $visualizado) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Mensagem (mensagem, data, id_funcionario_remetente, id_funcionario_destinatario, excluido, assunto, visualizado) VALUES (:mensagem, :data, :id_funcionario_remetente, :id_funcionario_destinatario, :excluido, :assunto, :visualizado)");

		$stmt->bindParam(":mensagem", $mensagem);
		$stmt->bindParam(":id_funcionario_remetente", $id_funcionario_remetente);
		$stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);
		$stmt->bindParam(":excluido", $excluido);
		$stmt->bindParam(":assunto", $assunto);
		$stmt->bindParam(":visualizado", $visualizado);

		if ($stmt->execute()) {

			return true;
		}
		else {
			return false;
		}

	}

	public function excluir($id_mensagem) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("UPDATE Mensagem SET excluido = 1 WHERE id_mensagem = :id_mensagem");

		$stmt->bindParam(":id_mensagem", $id_mensagem);

		if ($stmt->execute())
			return true;
		else
			return false;
	}

	public function listExcluidos($id_funcionario_destinatario) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Mensagem WHERE excluido = 1 and id_funcionario_destinatario = :id_funcionario_destinatario");
		$stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);

		$stmt->execute();
		
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	public function listEnviadas($id_funcionario_remetente) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Mensagem WHERE excluido = 0 and id_funcionario_remetente = :id_funcionario_remetente");
		$stmt->bindParam(":id_funcionario_remetente", $id_funcionario_remetente);

		$stmt->execute();
		
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}


}




?>