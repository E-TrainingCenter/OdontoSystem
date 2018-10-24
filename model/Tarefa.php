<?php


require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");

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

    public function listAll($id_funcionario_destinatario) {
        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT * FROM Tarefa WHERE excluido = 0 and status != 'FINALIZADO' and id_funcionario_destinatario = :id_funcionario_destinatario ORDER BY data_fim DESC");
        $stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function EnviaTarefa($descricao, $data_inicio, $data_fim, $id_funcionario_remetente, $id_funcionario_destinatario, $status, $excluido, $assunto){
        $conn = Banco::connect();
       
        $stmt = $conn->prepare("INSERT INTO Tarefa (descricao, data_inicio, data_fim, id_funcionario_remetente, id_funcionario_destinatario, status, excluido, assunto) VALUES (:descricao, :data_inicio, :data_fim, :id_funcionario_remetente, :id_funcionario_destinatario, :status, :excluido, :assunto)");

        
        $stmt->bindParam(":descricao", $descricao); 
        $stmt->bindParam(":data_inicio", $data_inicio);
		$stmt->bindParam(":data_fim", $data_fim);
        $stmt->bindParam(":id_funcionario_remetente", $id_funcionario_remetente);
        $stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":excluido", $excluido);
        $stmt->bindParam(":assunto", $assunto);

        if($stmt->execute()){
            return true;
        }
        else {
            return false;
        }
    }


    public function listExcluidos($id_funcionario_destinatario) {

        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT * FROM Tarefa WHERE status = 'FINALIZADO' and id_funcionario_destinatario = :id_funcionario_destinatario");
        $stmt->bindParam(":id_funcionario_destinatario", $id_funcionario_destinatario);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function listEnviadas($id_funcionario_remetente) {

        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT * FROM Tarefa WHERE excluido = 0 and id_funcionario_remetente = :id_funcionario_remetente ORDER BY data_fim DESC");
        $stmt->bindParam(":id_funcionario_remetente", $id_funcionario_remetente);

        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function atualizaStatus($id_tarefa, $status) {
        $conn = Banco::connect();

        $stmt = $conn->prepare("UPDATE Tarefa SET status = :status WHERE id_tarefa = :id_tarefa");
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id_tarefa", $id_tarefa);

        if ($stmt->execute())
            return true;
        else
            return false;
    }

    public static function returnNomeById($id_funcionario) {

		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT nome FROM Tarefa, Funcionario WHERE id_funcionario = :id_funcionario");
		$stmt->bindParam(":id_funcionario", $id_funcionario);

		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results[0]['nome'];
	}

    public function GetTarefaById($id_tarefa) {
        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT id_funcionario_remetente, data_fim, status, descricao, assunto FROM Tarefa WHERE id_tarefa = :id_tarefa");
        $stmt->bindParam(":id_tarefa", $id_tarefa);

        $stmt->execute();

       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

       return $results[0];

    }



}


?>