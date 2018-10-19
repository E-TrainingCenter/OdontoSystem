<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/GrupoController.php");

$grupocontroller = new GrupoController();

$grupos = $grupocontroller->listAll();

if (isset($_GET['id_inativar'])) {

	$id_grupo = $_GET['id_inativar'];

	$grupocontroller->inativar($id_grupo);
}

?>

<body>
	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Grupos</h2>
				<hr>
			</div>
		</div>

		<div class="row">

			<div class="col-md-2">
				<a href="/OdontoSystem/view/Administracao/Grupo/adicionar.php">Adicionar</a>
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

									foreach ($grupos as $key => $value) {
										$id_grupo = $value['id_grupo'];

										echo "<tr>";
										echo "<td>". $value['descricao']. "</td>";	

										echo "<td> <a href='/OdontoSystem/view/Administracao/Grupo/index.php?id_inativar=$id_grupo'>Inativar</a> </td>";
										echo "<td> <a href='#inativar'>Editar</a> </td>";
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