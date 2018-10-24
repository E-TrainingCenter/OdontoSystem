<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/QuestaoController.php");

$questaocontroller = new QuestaoController();

$questoes = $questaocontroller->listAll();

?>

<body>
	<div class="container" >
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Questões</h2>
				<hr>
			</div>
			<div style="width: 10vw; margin-left: 10vw;">
				<a href="/OdontoSystem/view/Administracao/Questao/adicionar.php" ><h3>Adicionar</h3></a>	
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
			<div class="panel" style="width: 70vw; text-align: center; border: solid 10px #ddd; margin-right: 10px;">
				<div class="panel-body" >
					<h3>Questoes</h3>

					<table class="table"> 
						<thead>
							<tr>
								<th>Questao</th>

								<th>Pergunta</th>

								<th>Resposta</th>
							</tr>
						</thead>

						<tbody>
							
								<?php
									foreach ($questoes as $key => $value) {
										$id_questao = $value['id_questao'];

										echo "<tr>";
										echo "<td>". $value['id_questao']. "</td>";	
										echo "<td>". $value['pergunta']. "</td>";	
										echo "<td>". $value['resposta']. "</td>";	
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
