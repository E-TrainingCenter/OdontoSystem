<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TreinamentoController.php");

$treinamentocontroller = new TreinamentoController();

$treinamentos = $treinamentocontroller->listAll();


?>

<body>
	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Treinamentos</h2>
				<hr>
			</div>
		</div>

		<div class="row">

			<div class="col-md-2">
				<a href="/OdontoSystem/view/Administracao/Treinamento/adicionar.php">Adicionar</a>
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
								<th>Grupos</th>

								<th>Inativar</th>

								<th>Editar</th>
							</tr>
						</thead>

						<tbody>
							
								<?php

									foreach ($treinamentos as $key => $value) {
										$id_treinamento = $value['id_treinamento'];

										echo "<tr>";
										echo "<td>". $value['descricao']. "</td>";	

										echo "<td> <a href='#'>#</a> </td>";
										echo "<td> <a href='/OdontoSystem/view/Administracao/Treinamento/editar.php?id_editar=$id_treinamento'>Editar</a> </td>";
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