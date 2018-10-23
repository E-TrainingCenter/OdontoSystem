<?php
	require_once("../view/header.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
?>
<link href="/OdontoSystem/resources/css/layoutcss.css" rel="stylesheet">
<body>

	<div style = "width: 100vw;padding: 1vh 5vw 0vw 5vw">
		<table class="table1" > 
			<tr> 
				<th class = "table1th">
					Mensagens
				</th>
		
			
				<th class = "table1th">
					Tarefas
				</th>

				<th class = "table1th">
					Treinamentos
				</th>

			</tr>
			
			<tr>
				<td class="table1tr">
					<?php					
						$mensagemcontroller = new MensagemController();
						$msgs = $mensagemcontroller->listAll();
						
						foreach($msgs as $key => $value) {
					?>
					<p>
						<?php
								if ($value['visualizado'] == 0)
									echo $value['data']. "  - " . $value['assunto'];
								
							}
						?>
					</p>          
				</td>
				<td class="table1tr">
					<?php					
						$tarefacontroller = new TarefaController();
						$tarefas = $tarefacontroller->listAll();
						
						foreach($tarefas as $key => $value) {
					?>
					<p>
						<?php
								echo $value['data_inicio']. "  - " . $value['descricao'];
								
							}
						?>
					</p>          
				</td>
				<td class="table1tr">
         
				</td>
			</tr>

				

			
		</table>
	</div>           

</body>
<?php
	require_once("../view/footer.php");
?>
</html>

