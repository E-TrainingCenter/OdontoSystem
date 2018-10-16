<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Grupo.php");

class GrupoController{
    public function CadastrarGrupo($descricao){
        $grupo = new Grupo();
        $grupo->Add($descricao, 1);
    }
}

?>