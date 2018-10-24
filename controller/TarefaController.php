<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Tarefa.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Funcionario.php");

class TarefaController{
	
    public function listAll() {
		$tarefa = new Tarefa();
		$tarefas = $tarefa->listAll($_SESSION['id_funcionario']);
		return $tarefas;
	}

	public function listExcluidos() {
		$tarefa = new Tarefa();
		$tarefas = $tarefa->listExcluidos($_SESSION['id_funcionario']);
		return $tarefas;
	}

	public function listEnviadas() {
		$tarefa = new Tarefa();
		$tarefas = $tarefa->listEnviadas($_SESSION['id_funcionario']);
		return $tarefas;
	}
	
	public function returnNomeById($id_funcionario) {
		$nome = Tarefa::returnNomeById($id_funcionario);
		return $nome;
	}

	public function listAllFuncionarios() {

		$funcs = Funcionario::listAll();

		return $funcs;
	}

	public function returnIdByNome($nome) {

		$funcionario = new Funcionario();

		$id_funcionario = $funcionario->returnIdByNome($nome);
		
		return $id_funcionario;
	}

	public function EnviaTarefa($descricao, $data_fim, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto) {
	
		$tarefa = new Tarefa();

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');

		$tarefa->EnviaTarefa($descricao, $date, $data_fim, $id_funcionario_remetente, $id_funcionario_destinatario, "A fazer", 0, $assunto);

		header("Location: /OdontoSystem/view/Tarefa/caixa_entrada.php");
	}

	public function GetTarefaById($id_tarefa) {

		$tarefa = new Tarefa();

		$tarefa = $tarefa->GetTarefaById($id_tarefa);
		
		return $tarefa;
	}

	public function atualizaStatus($id_tarefa, $status) {

		$tarefa = new Tarefa();

		$tarefa->atualizaStatus($id_tarefa, $status);

		header("Location: /OdontoSystem/view/Tarefa/caixa_entrada.php");
	}

	public function finalizar($id_tarefa, $status) {

		$this->atualizaStatus($id_tarefa, $status);

		header("Location: /OdontoSystem/view/Tarefa/tarefas_enviadas.php");	
	}


}
?>