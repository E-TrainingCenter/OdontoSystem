<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/FuncionarioController.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/CargoController.php");

	$cargo = new CargoController();
	$c = $cargo->ListAll();


if (isset($_GET['id_editar'])) {

	$funcionariocontroller = new FuncionarioController();
	$funcionario = $funcionariocontroller->GetFuncionarioById($_GET['id_editar']);

	$nome = $funcionario['nome'];
	$cpf = $funcionario['cpf'];
	$endereco = $funcionario['endereco'];
	$id_cargo = $funcionario['id_cargo'];
	$sexo = $funcionario['sexo'];
	$senha = $funcionario['senha'];

	$cargo = new CargoController();
	$descricao_cargo = $cargo->GetCargo($funcionario['id_cargo']);
	$descricao_cargo = $descricao_cargo['cargo'];

}

if (isset($_POST['editar'])) {

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$id_cargo = $cargo->GetId_cargoByDescricao($_POST['cargo']); 
	$sexo = $_POST['sexo'];
	$senha = $_POST['senha'];
	$id_funcionario = $_GET['id_editar'];

	$funcionariocontroller = new FuncionarioController();
	$funcionariocontroller->editar($id_funcionario, $nome, $cpf, $endereco, $id_cargo, $sexo, $senha);
}


?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Editar Funcionário</h2>
				<hr>
			</div>
		</div>

		<form method="POST">
			<div class="form-group">
				Nome: <input type="text" value=<?=$nome;?> name="nome" class="form-control">
				Sexo: 
				<?php
					if (($sexo == 'feminino') or ($sexo = 'Feminino')) {
						echo "<br> Masculino <input type='radio' name='sexo' value='Masculino' ><br> Feminino<input type='radio' checked name='sexo' value='Feminino'><br>";
					}
					else 
						echo "<br> Masculino <input type='radio' name='sexo' checked value='Masculino' ><br> Feminino<input type='radio' cheked name='sexo' value='Feminino'><br>";

				?>
				
				CPF: <input type="text" name="cpf" value=<?=$cpf;?> class="form-control">
				Endereco: <input type="text" name="endereco" value=<?=$endereco?> class="form-control">
				Cargo: 
				<select class="form-control" name="cargo">	
					
					<?php  
					echo "<option value=$descricao_cargo> $descricao_cargo </option>";
					foreach ($c as $key => $value) {
							$c = $value['cargo'];
							echo "<option value=$c> ". $c ." </option>";
						}	

					?>

				</select>
				Senha: <input type="password" value=<?=$senha;?> name="senha" class="form-control"><br>

				<button type="submit" class="btn btn-success" value="editar" name="editar">Editar</button> <br> <br>
				<button class="btn btn-default"><a href="/OdontoSystem/view/Administracao/Funcionario/index.php">Voltar</a></button>
			</div>
		</form>
	</div>


</body>

<?php
	require_once("../../footer.php");
?>
</html>