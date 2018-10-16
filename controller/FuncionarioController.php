<?php

require_once("../model/Funcionario.php");

class FuncionarioController {


	public function login($nome, $senha) {
		
		if ($_POST['nome'])

		$funcionario = new Funcionario();

		$funcionario->login($nome, $senha);

		session_start();

		$_SESSION['nome'] = $nome;

		header("Location: ../view/Home.php");

	}


}



?>