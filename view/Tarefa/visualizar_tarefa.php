<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
	require_once("../header.php");

	$id_tarefa = $_GET['id'];

	$tarefacontroller = new TarefaController();
	$tarefa = $tarefacontroller->GetTarefaById($id_tarefa);

	$nome = $tarefacontroller->returnNomeById($tarefa['id_funcionario_remetente']);

?>


<body>
	<h2>Tarefa</h2>
	
	<div class="container">
		<div class="row">
			De: <input type="text" value=<?=$nome?> class="form-control">
		</div>

		<div class="row">
			Assunto: <input type="text" value=<?=$tarefa['assunto']?> class="form-control">
		</div>
		<br>
		<div class="row">
			<textarea class="form-control"> <?=$tarefa['descricao']?> </textarea>
		</div>
		<br>
		<button class="btn btn-primary btn-lg botao">Responder</button>
		<button class="btn btn-default btn-lg botao"><a href="/OdontoSystem/view/Tarefa/caixa_entrada.php">Voltar</a></button>
	</div>

</body>
</html>