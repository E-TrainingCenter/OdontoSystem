<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/config/DB/Banco.php");

class Questao{
    private $id_questao;
    private $pergunta;
    private $alternativa1;
    private $alternativa2;
    private $alternativa3;
    private $alternativa4;
    private $resposta;
     

    public function getIdQuestao(){
        return $this->id_questao;
    }

    public function setQuestao($questao){
        $this->questao = $questao;
    }

    public function getQuestao(){
        return $this->questao;
    }

    public function setPergunta($pergunta){
        $this->pergunta = $pergunta;
    }

    public function getPergunta(){
        return $this->pergunta;
    }

       public function setAlternativa1($alternativa1){
        $this->alternativa1 = $alternativa1;
    }

    public function getAlternativa1(){
        return $this->alternativa1;
    }

    public function setAlternativa2($alternativa2){
        $this->alternativa2 = $alternativa2;
    }

    public function getAlternativa2(){
        return $this->alternativa2;
    }

    public function setAlternativa3($alternativa3){
        $this->alternativa3 = $alternativa3;
    }

    public function getAlternativa3(){
        return $this->alternativa3;
    }

    public function setAlternativa4($alternativa4){
        $this->alternativa4 = $alternativa4;
    }

    public function getAlternativa4(){
        return $this->alternativa4;
    }




    public function AdicionarQuestao($pergunta, $alternativa1, $alternativa2, $alternativa3, $alternativa4, $resposta) {
        $conn = Banco::connect();

        $stmt = $conn->prepare("INSERT INTO questao (pergunta, alternativa1, alternativa2, alternativa3, alternativa4, resposta) VALUES (:pergunta, :alternativa1, :alternativa2, :alternativa3, :alternativa4, :resposta)");

        $stmt->bindParam(":pergunta", $pergunta);
		$stmt->bindParam(":alternativa1", $alternativa1);
        $stmt->bindParam(":alternativa2", $alternativa2);
        $stmt->bindParam(":alternativa3", $alternativa3);
        $stmt->bindParam(":alternativa4", $alternativa4);
        $stmt->bindParam(":reposta", $resposta);
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function GetQuestaoById($id_questao) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM questao WHERE id_questao = :id_questao");

        $stmt->bindParam(":id_questao", $id_questao);
        
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
		return $results[0];

    }
    
    public static function listAll(){
        $conn = Banco::connect();

        $stmt = $conn->prepare("SELECT * FROM questao");

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
    
}


?>