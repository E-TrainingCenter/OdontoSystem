<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Tarefa.php");

class TarefaController{
    public function AddTarefa($descricao, $data_fim, $id_funcionario_remetente, $assunto){
        $tarefa = new Tarefa();
        $tarefa->EnviarTarefa($descricao, $data_fim, $id_funcionario_remetente, $assunto);
    }
}

?>