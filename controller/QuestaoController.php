<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Questao.php");

class QuestaoController {


	public function AdicionarQuestao($pergunta, $alternativa1, $alternativa2, $alternativa3, $alternativa4, $resposta) {

        $questao = new Questao();
        
        $questao->AdicionarQuestao($pergunta, $alternativa1, $alternativa2, $alternativa3, $alternativa4, $resposta);	

    }
    
    public function GetQuestao($id_questao){
        $questao = new Questao();

        $resultado = $questao->GetQuestaoById($id_questao);

        return $resultado;
    }

    public function ListAll(){
        $questao = new Questao();

        $results = $questao->ListAll();

        return $results;
    } 
}



?>