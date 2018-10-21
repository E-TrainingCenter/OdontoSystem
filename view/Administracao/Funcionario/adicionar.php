<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/FuncionarioController.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/CargoController.php");

	$cargo = new CargoController();
	$c = $cargo->ListAll();


if (isset($_POST['nome']) && isset($_POST['senha'])) {

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$id_cargo = 1;
	$sexo = $_POST['sexo'];
	$senha = $_POST['senha'];

	$funcionariocontroller = new FuncionarioController();
	

	

	$funcionariocontroller->CadastrarFuncionario($nome, $cpf, $endereco, $id_cargo, $sexo, $senha);

}


?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Novo Funcionário</h2>
				<hr>
			</div>
		</div>

		<form method="POST">
			<div class="form-group">
				Nome: <input type="text" name="nome" class="form-control">
				Sexo: <br> Masculino <input type="radio" name="sexo" value="Masculino" ><br> Feminino<input type="radio" name="sexo" value="Feminino"><br>
				CPF: <input type="text" name="cpf" class="form-control">
				Endereco: <input type="text" name="endereco" class="form-control">
				Cargo: 
				<select class="form-control" name="destinatario">	
					<option>---</option>
					<?php  

					foreach ($c as $key => $value) {
							$c = $value['cargo'];
							echo "<option value=$c> ". $c ." </option>";
						}	

					?>

				</select>
				Senha: <input type="password" name="senha" class="form-control"><br>

				<button type="submit" class="btn btn-success">Cadastrar</button> <br> <br>
				<button href="/OdontoSystem/view/Administracao/Funcionario/index.php" class="btn btn-default">Voltar</button>
			</div>
		</form>
	</div>


</body>
</html>