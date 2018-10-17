<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Mensagem.php");

class MensagemController {
	
	public function EnviaMensagem($mensagem, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto) {

		$mensagem = new Mensagem();

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');

		$mensagem->EnviaMensagem($mensagem, $date, $id_funcionario_remetente, $id_funcionario_destinatario, 0, $assunto, 0);

		header("Location: #");
	}

	public function listAll() {

		$mensagem = new Mensagem();

		$msgs = $mensagem->listAll($_SESSION['id_funcionario']);

		return $msgs;
	}

	public function listExcluidos() {

		$mensagem = new Mensagem();

		$msgs = $mensagem->listExcluidos($_SESSION['id_funcionario']);

		return $msgs;
	}

	public function listEnviadas() {

		$mensagem = new Mensagem();

		$msgs = $mensagem->listEnviadas($_SESSION['id_funcionario']);

		return $msgs;
	}
}



?>