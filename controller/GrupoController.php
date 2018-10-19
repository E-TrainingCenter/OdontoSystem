<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Grupo.php");

class GrupoController{
	
    public function CadastrarGrupo($descricao){
        $grupo = new Grupo();
        $grupo->Add($descricao, 1);
    }

   public function listAll() {

	   	$grupo = new Grupo();

	   $grupos = $grupo->listAll();

	   	return $grupos;
   }

   public function inativar($id_grupo) {
   		$grupo = new Grupo();

   		$grupo->inativar($id_grupo);

   		header("Location: /OdontoSystem/view/Administracao/Grupo/index.php");

   }

}

?>