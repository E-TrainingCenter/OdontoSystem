<?php


require_once("../config/DB/Banco.php");

class Tarefa {
    private $id_tarefa;
    private $descricao;
    private $data_inicio;
    private $data_fim;
    private $id_funcionario_remetente;
    private $id_funcionario_destinatario;
    private $status;
    private $excluido;
    private $assunto;

    public function getId_tarefa(){
        return $this->id_tarefa;
    }

    public function setTarefa($tarefa){
        $this->tarefa = $tarefa;
    }

    public function getTarefa(){
        return $this->tarefa;
    }

    public function setDataInicio($data){
        $this->data_inicio = $data;
    }

    public function getDataInicio(){
        return $this->data_inicio;
    }

    public function setDataFim($data){
        $this->data_fim = $data;
    }

    public function getDataFim(){
        return $this->data_fim;
    }

    public function setIdFuncionarioRemetente($id_funcionario){
        $this->id_funcionario_remetente = $id_funcionario;
    }

    public function getIdFuncionarioRemetente(){
        return $this->id_funcionario_remetente;
    }

    public function setIdFuncionarioDestinatario($id_funcionario){
        $this->id_funcionario_destinatario = $id_funcionario;
    }

    public function getIdFuncionarioDestinatario(){
        return $this->id_funcionario_destinatario;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setExcluido($excluido){
        $this->excluido = $excluido;
    }

    public function getExcluido(){
        return $this->excluido;
    }

    public function setAssunto($assunto){
        $this->assunto = $assunto;
    }

    public function getAssunto(){
        return $this->assunto;
    }

    public function listAll() {
        $conn = Banco::connect();

        $stmt = $connt->prepare("SELECT * FROM Tarefa WHERE excluido = 0");

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function EnviaTarefa(){
        $conn = Banco::connect();

        $stmt = $conn->prepare("INSERT INTO Tarefa (descricao, data_inicio, data_fim, id_funcionario_remetente, id_funcionario_destinatario, status, excluido, assunto) VALUES (:descricao, :data_inicio, :data_fim, :id_funcionario_remetente, :id_funcionario_destinatario, :status, :excluido, :assunto)");

        if($stmt->execute()){
            return true;
        }
        else {
            return false;
        }
    }


    public function listExcluidos() {

        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT * FROM Tarefa WHERE excluido = 1");

        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }



}


?>