<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Treinamento.php");

class TreinamentoController{
	
    public function listAll() {
		$treinamento = new Treinamento();
		$treinamentos = $treinamento->listAll();
		return $treinamentos;
	}

	public function Add($descricao, $id_responsavel) {

		$treinamento = new Treinamento();

		$treinamento->Add($descricao, $id_responsavel);

		header("Location: /OdontoSystem/view/Administracao/Treinamento/index.php");
	}

	public function returnTreinamentoById($id_editar) {
		$treinamento = new Treinamento();

		$result = $treinamento->returnTreinamentoById($id_editar);

		return $result;
	}

	public function funcionariosDisponiveis($id_treinamento) {
		$treinamento = new Treinamento();

		$result = $treinamento->funcionariosDisponiveis($id_treinamento);

		return $result;
	}

	public function funcionariosIndisponiveis($id_treinamento) {

	    $treinamento = new Treinamento();

	    $results = $treinamento->funcionariosIndisponiveis($id_treinamento);

	    return $results;
	}

	  public function editar($id_treinamento) {
      $treinamento = new Treinamento();

      $treinamento->editar($id_treinamento);

      header("Location: /OdontoSystem/view/Administracao/Treinamento/index.php");

   }

   public function addFuncionario($id_funcionario, $id_treinamento) {
   	$treinamento = new Treinamento();

   	$treinamento->addFuncionario($id_funcionario, $id_treinamento);

   	header("Location: /OdontoSystem/view/Administracao/Treinamento/editar.php?id_editar=$id_treinamento");
   }

     public function removeFuncionario($id_funcionario, $id_treinamento) {

      $treinamento = new Treinamento();

      $result = $this->returnTreinamentoById($id_treinamento);
      $id_treinamento = $result['id_treinamento'];

      $treinamento->removeFuncionario($id_funcionario, $id_treinamento);

      header("Location: /OdontoSystem/view/Administracao/Treinamento/editar.php?id_editar=$id_treinamento");


   }
}

?>