<?php
session_start();

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