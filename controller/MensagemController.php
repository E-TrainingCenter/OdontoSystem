<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Mensagem.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Funcionario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Grupo.php");


class MensagemController {
	
	public function EnviaMensagem($mensagem, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto) {

		$msg = new Mensagem();

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');

		$msg->EnviaMensagem($mensagem, $date, $id_funcionario_remetente, $id_funcionario_destinatario, 0, $assunto, 0);

		header("Location: /OdontoSystem/view/Mensagem/caixa_entrada.php");
	}

	public function EnviaMensagemGrupo($mensagem, $id_funcionario_remetente, $id_grupo, $assunto) {

		$funcs = new Grupo();
		$funcs = $funcs->funcionariosIndisponiveis($id_grupo);
		
		foreach ($funcs as $key => $value) {
			$this->EnviaMensagem($mensagem, $id_funcionario_remetente, $value['id_funcionario'], $assunto);
		}		

		header("Location: /OdontoSystem/view/Mensagem/caixa_entrada.php");

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

	public function returnNomeById($id_funcionario) {
				$nome = Mensagem::returnNomeById($id_funcionario);

		return $nome;
	}

	public function GetMensagemById($id_mensagem) {

		$mensagem = new Mensagem();

		$msg = $mensagem->GetMensagemById($id_mensagem);
		
		$mensagem->visualizar($id_mensagem);

		return $msg;
	}

	public function listAllFuncionarios() {

		$funcs = Funcionario::listAll();

		return $funcs;
	}

	 public function listAllGrupos() {

	   $grupos = Grupo::listAll();

	   	return $grupos;
   }

	public function returnIdByNome($nome) {

		$funcionario = new Funcionario();

		$id_funcionario = $funcionario->returnIdByNome($nome);
		
		return $id_funcionario;
	}

	public function excluir($id_mensagem) {
		$mensagem = new Mensagem();

		$mensagem->excluir($id_mensagem);

		header("Location: /OdontoSystem/view/Mensagem/caixa_entrada.php");
	}

	
}



?>