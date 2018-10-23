<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
	require_once("../header.php");

	$id_tarefa = $_GET['id'];

	$tarefacontroller = new TarefaController();
	$tarefa = $tarefacontroller->GetTarefaById($id_tarefa);
	$nome = $tarefacontroller->returnNomeById($tarefa['id_funcionario_remetente']);
	
?>


<body>
	<h2 class="title">Tarefa <?php echo $tarefa['status']; ?></h2>
	
	<div class="container">
		<div class="row">
			<h3>De: </h3>
			<input readonly="true" type="text" value=<?=$nome?> class="form-control">
		</div>
		<br>

		<div class="row">
			<h3>Assunto: </h3>
			<input readonly="true"type="text" value=<?=$tarefa['assunto']?> class="form-control">
		</div>
		<br>

		
		<div class="row">
			<h3>Tarefa</h3>
			<textarea readonly="true"class="form-control"> <?=$tarefa['descricao']?> </textarea>
		</div>
		<br>

		<div class="row">
			<h3>Prazo:</h3>
			<input readonly="true" class="form-control" type="text" value=<?=$tarefa['data_fim']?>>
			<br>
			<h3>Status: </h3>
			<input readonly="true" type="text" class="form-control" value=<?php echo $tarefa['status'];  ?>> 
			<br>
		</div>
		<br>

		<div class="row">
			<button class="btn btn-primary btn-lg botao" style = "width:20vh">Responder</button>
			<a href="/OdontoSystem/view/Tarefa/caixa_entrada.php" style = "margin-left: 20px;"><h4>Voltar</h4></a>
		</div>
	</div>

</body>

<?php
	require_once("../footer.php");
?>
</html>