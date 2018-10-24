<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
	require_once("../header.php");

	$id_tarefa = $_GET['id'];

	$tarefacontroller = new TarefaController();
	$tarefa = $tarefacontroller->GetTarefaById($id_tarefa);
	$nome = $tarefacontroller->returnNomeById($tarefa['id_funcionario_remetente']);
	
	if (isset($_POST['atualizar']) && isset($_POST['status'])) {

		$tarefacontroller->atualizaStatus($_GET['id'], $_POST['status']);

	}

	if (isset($_POST['finalizar']) && $_POST['finalizar'] == 'finalizar') {

		$tarefacontroller->finalizar($_GET['id'], "FINALIZADO");
	}

?>


<body>
	<h2 class="title">Tarefa </h2>
	
	<div class="container">
		<div class="row">
		<form method="POST">
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
				<?php 
					if (isset($_GET['funcionario']) && $_GET['funcionario'] == 'destinatario') { ?>
						<textarea type="text" class="form-control" name="status"> <?php echo $tarefa['status']; ?> </textarea> 
				<?php } 
					else { ?>
						<textarea readonly="true" type="text" class="form-control" name="status"> <?php echo $tarefa['status']; ?> </textarea> 
					<?php }
				 ?>
			<br>
		</div>
		<br>

		<div class="row">
			<?php 
				if (isset($_GET['funcionario']) && $_GET['funcionario'] == 'remetente') {
					echo "<button type='submmit' class='btn btn-danger btn-lg botao' name='finalizar' value='finalizar' style = 'width:20vh'>FINALIZAR TAREFA</button>'";
					echo "<a href='/OdontoSystem/view/Tarefa/tarefas_enviadas.php' style = 'margin-left: 20px;'><h4>Voltar</h4></a>";
				}
				else if (isset($_GET['finalizada']) && $_GET['finalizada'] == 'true') {
					echo "<button type='submmit' disabled class='btn btn-primary btn-lg botao' name='atualizar' value='atualizar' style = 'width:20vh'>Atualizar</button>'";
					echo "<a href='/OdontoSystem/view/Tarefa/tarefas_excluidas.php' style = 'margin-left: 20px;'><h4>Voltar</h4></a>";
				}
				else {
					echo "<button type='submmit' class='btn btn-primary btn-lg botao' name='atualizar' value='atualizar' style = 'width:20vh'>Atualizar</button>'";
					echo "<a href='/OdontoSystem/view/Tarefa/caixa_entrada.php' style = 'margin-left: 20px;'><h4>Voltar</h4></a>";
				}
			?>
		</div>
	</form>
	</div>

</body>

<?php
	require_once("../footer.php");
?>
</html>