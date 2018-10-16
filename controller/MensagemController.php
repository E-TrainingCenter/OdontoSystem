<?php

class MensagemController {
	
	public function EnviaMensagem($mensagem, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto) {

		$mensagem = new Mensagem();

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');

		$mensagem->EnviaMensagem($mensagem, $date, $id_funcionario_remetente, $id_funcionario_destinatario, 0, $assunto, 0);

		header("Location: #");
	}
}



?>