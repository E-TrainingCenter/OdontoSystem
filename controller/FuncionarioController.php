<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Funcionario.php");

class FuncionarioController {


	public function login($nome, $senha) {

			$funcionario = new Funcionario();

			$funcionario->login($nome, $senha);

			session_start();

			$_SESSION['nome'] = $nome;

			header("Location: /OdontoSystem/view/Home.php");
	

	}


}



?>