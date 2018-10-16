<?php

require_once("../config/DB/Banco.php");


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

	public function listAll() {

		$conn = Banco::connect();

		$stmt = $connt->prepare("SELECT * FROM Mensagem");

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;

	}

	public function EnviaMensagem() {
		$conn = Banco::connect();

		$stmt = $conn->prepare("INSERT INTO Mensagem (mensagem, data, id_funcionario_remetente, id_funcionario_destinatario, excluido, assunto, visualizado) VALUES (:mensagem, :data, :id_funcionario_remetente, :id_funcionario_destinatario, :excluido, :assunto, :visualizado)");

		if ($stmt->execute()) {

			return true;
		}
		else {
			return false;
		}

	}


}




?>