<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/FuncionarioController.php");

$funcionariocontroller = new FuncionarioController();

$funcionarios = $funcionariocontroller->listAll();
$funcionarios_inativos = $funcionariocontroller->listInativos();

if (isset($_GET['id_inativar'])) {

	$id_funcionario = $_GET['id_inativar'];

	$funcionariocontroller->inativar($id_funcionario);
}

if (isset($_GET['id_ativar'])) {

	$id_funcionario = $_GET['id_ativar'];

	$funcionariocontroller->ativar($id_funcionario);
}

?>

<body>
	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Funcionários</h2>
				<hr>
			</div>
		</div>

		<div class="row">

			<div class="col-md-2">
				<a href="/OdontoSystem/view/Administracao/Funcionario/adicionar.php">Adicionar</a>
			</div>
			<div class="col-md-4">
				<a href="/OdontoSystem/view/Administracao/HomeAdministracao.php">Voltar</a>			
			</div>

		</div>
		<div class="row">
			<div class="panel">
				<div class="panel-body">

					<table class="table"> 
						<thead>
							<tr>
								<th>Funcionarios</th>

								<th>Ativar</th>

								<th>Editar</th>
							</tr>
						</thead>

						<tbody>
							
								<?php

									foreach ($funcionarios as $key => $value) {
										$id_funcionario = $value['id_funcionario'];

										echo "<tr>";
										echo "<td>". $value['nome']. "</td>";	

										echo "<td> <a href='/OdontoSystem/view/Administracao/Funcionario/index.php?id_inativar=$id_funcionario'>Inativar</a> </td>";
										echo "<td> <a href='#inativar'>Editar</a> </td>";
										echo "</tr>";
									}
									
								
				
								?>
							
						</tbody>
					
					</table>

				</div>

			</div>
		</div>


<h1>Funcionarios Inativos</h1>
		<div class="row">
			<div class="panel">
				<div class="panel-body">

					<table class="table"> 
						<thead>
							<tr>
								<th>Funcionarios</th>

								<th>Ativar</th>

								<th>Editar</th>
							</tr>
						</thead>

						<tbody>
							
								<?php

									foreach ($funcionarios_inativos as $key => $value) {
										$id_funcionario = $value['id_funcionario'];

										echo "<tr>";
										echo "<td>". $value['nome']. "</td>";	

										echo "<td> <a href='/OdontoSystem/view/Administracao/Funcionario/index.php?id_ativar=$id_funcionario'>ativar</a> </td>";
										echo "<td> <a href='#ativar'>Editar</a> </td>";
										echo "</tr>";
									}
									
								
				
								?>
							
						</tbody>
					
					</table>

				</div>

			</div>
		</div>

	</div>



</body>

</html>
