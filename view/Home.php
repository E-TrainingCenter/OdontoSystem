<?php
require_once("../view/header.php");

?>
<style type="text/css">

.table1 {	
	width: 30vw; 
	border: solid 1px #ddd; 
	font-size: 6vh; 
	padding: 1vh; 
	margin-top: 10px; 
	text-align: center;
}

</style>
<body>

	<h3>Bem Vindo <?php echo $_SESSION['id_funcionario'] . ' | ' . $_SESSION['nome']; ?></h3>

	<div style = "width: 100vw; padding: 1vh 5vw 0vw 5vw">
		<table> 
			<th class="table1">
				Mensagens
			</th>
			<th class="table1">
				Tarefas
			</th>
			<th class="table1"	>
				Treinamentos
			</th>
			
		</table>
	</div>           

</body>

</html>