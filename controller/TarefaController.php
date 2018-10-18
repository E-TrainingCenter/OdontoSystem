<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Tarefa.php");

class TarefaController{
    public function AddTarefa($descricao, $data_fim, $id_funcionario_remetente, $assunto){
        $tarefa = new Tarefa();
        $tarefa->EnviarTarefa($descricao, $data_fim, $id_funcionario_remetente, $assunto);
    }

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
}

?>