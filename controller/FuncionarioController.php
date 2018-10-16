<?php

require_once("../model/Funcionario.php");

class FuncionarioController {


	public function login($nome, $senha) {
		
		if (isset($_POST['nome']) and isset($_POST['senha'])) {

			$nome = $_POST['nome'];
			$senha = $_POST['senha'];

			$funcionario = new Funcionario();

			$funcionario->login($nome, $senha);

			session_start();

			$_SESSION['nome'] = $nome;

			header("Location: ../view/Home.php");
	}

	}


}



?>