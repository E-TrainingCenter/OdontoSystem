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
	<div class="container" >
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Funcionários</h2>
				<hr>
			</div>
			<div style="width: 10vw; margin-left: 10vw;">
				<a href="/OdontoSystem/view/Administracao/Funcionario/adicionar.php" ><h3>Adicionar</h3></a>	
			</div>
			<div>
				<a href="/OdontoSystem/view/Administracao/HomeAdministracao.php"><h3>Voltar</h3></a>			
			</div>
		</div>
		<center>
			<div class="row" style="width: 80vw; padding: 10px; margin-left: 20vw;">
				
			</div>
		</center>

		<div class="row" style=" width: 80vw; margin-left: 10vw; text-align: center;" >
			<div class="panel" style="width: 30vw; text-align: center; border: solid 10px #ddd; margin-right: 10px;">
				<div class="panel-body" >
					<h3>Funcionarios Ativos</h3>

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
										echo "<td> <a href='/OdontoSystem/view/Administracao/Funcionario/editar.php?id_editar=$id_funcionario'>Editar</a> </td>";
										echo "</tr>";
									}
									
								
				
								?>
							
						</tbody>
					
					</table>

				</div>

			</div>
		


		

					<div class="panel" style="width: 30vw; text-align: center; border: solid 10px #ddd"">
						<div class="panel-body" style="width: 50%">
							<h3>Funcionarios Inativos</h3>

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

<?php
	require_once("../../footer.php");
?>

</html>
