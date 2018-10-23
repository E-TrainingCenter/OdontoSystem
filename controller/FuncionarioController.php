<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Funcionario.php");

class FuncionarioController {


	public function login($nome, $senha) {

			$funcionario = new Funcionario();

			$funcionario->login($nome, $senha);

			session_start();
			
			$_SESSION['nome'] = $nome;
			$_SESSION['id_funcionario'] = $funcionario->returnIdByNome($nome);

			header("Location: /OdontoSystem/view/Home.php");
	
	}

	public function CadastrarFuncionario($nome, $cpf, $endereco, $id_cargo, $sexo, $senha){
		$funcionario = new Funcionario();
		$funcionario->add($nome, $cpf, $endereco, $id_cargo, $sexo, $senha, 1);

		header("Location: /OdontoSystem/view/Administracao/Funcionario/index.php");
	}

	public function listAll() {

		$funcionario = new Funcionario();

		$results = $funcionario->listAll();

		return $results;
	}

	public function listInativos(){
		$funcionario = new Funcionario();

		$results = $funcionario->listInativos();

		return $results;
	}

	public function inativar($id_funcionario) {

		$funcionario = new Funcionario();

		$funcionario->inativar($id_funcionario);

		header("Location: /OdontoSystem/view/Administracao/Funcionario/index.php");
	}

	public function ativar($id_funcionario) {
		$funcionario = new Funcionario();

		$funcionario->ativar($id_funcionario);

		header("Location: /OdontoSystem/view/Administracao/Funcionario/index.php");
	}

	public function GetFuncionarioById($id_funcionario) {

		$funcionario = new Funcionario();

		$results = $funcionario->GetFuncionarioById($id_funcionario);

		return $results;	
	}
	
	public function editar($id_funcionario, $nome, $cpf, $endereco, $id_cargo, $sexo, $senha) {
		$funcionario = new Funcionario();

		$funcionario->editar($id_funcionario, $nome, $cpf, $endereco, $id_cargo['id_cargo'], $sexo, $senha, 1); 

		header("Location: /OdontoSystem/view/Administracao/Funcionario/index.php");
	}

}



?>