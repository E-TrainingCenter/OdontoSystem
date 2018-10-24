<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Grupo.php");

class GrupoController{
	
    public function CadastrarGrupo($descricao){
        $grupo = new Grupo();
        $grupo->Add($descricao, 1);

        header("Location: /OdontoSystem/view/Administracao/Grupo/index.php");
    }

   public function listAll() {

	   	$grupo = new Grupo();

	   $grupos = $grupo->listAll();

	   	return $grupos;
   }

    public function listInativos(){
      $grupo = new Grupo();

      $results = $grupo->listInativos();

      return $results;
  }

   public function inativar($id_grupo) {
   		$grupo = new Grupo();

   		$grupo->inativar($id_grupo);

   		header("Location: /OdontoSystem/view/Administracao/Grupo/index.php");

   }


  public function ativar($id_grupo) {
    $grupo = new Grupo();

    $grupo->ativar($id_grupo);

    header("Location: /OdontoSystem/view/Administracao/Grupo/index.php");
  }


   public function funcionariosDisponiveis($id_grupo) {

    $grupo = new Grupo();

    $results = $grupo->funcionariosDisponiveis($id_grupo);

    return $results;
  }

  public function funcionariosIndisponiveis($id_grupo) {

    $grupo = new Grupo();

    $results = $grupo->funcionariosIndisponiveis($id_grupo);

    return $results;
  }

   public function editar($id_grupo, $descricao) {
      $grupo = new Grupo();

      $grupo->editar($id_grupo, $descricao);

      header("Location: /OdontoSystem/view/Administracao/Grupo/index.php");

   }

   public function returnGrupoById($id_grupo) {

      $grupo = new Grupo();

      $result = $grupo->returnGrupoById($id_grupo);
      
      return $result;

   }

   public function addFuncionario($id_funcionario, $id_grupo) {
      $grupo = new Grupo();

      $result = $this->returnGrupoById($id_grupo);
      $id_grupo = $result['id_grupo'];

      $grupo->addFuncionario($id_funcionario, $id_grupo);

      header("Location: /OdontoSystem/view/Administracao/Grupo/editar.php?id_editar=$id_grupo");

   }

   public function removeFuncionario($id_funcionario, $id_grupo) {

      $grupo = new Grupo();

      $result = $this->returnGrupoById($id_grupo);
      $id_grupo = $result['id_grupo'];

      $grupo->removeFuncionario($id_funcionario, $id_grupo);

      header("Location: /OdontoSystem/view/Administracao/Grupo/editar.php?id_editar=$id_grupo");


   }



}

?>