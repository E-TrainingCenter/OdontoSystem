<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
require_once("../header.php");

$tarefacontroller = new TarefaController();

$funcionarios = $tarefacontroller->listAllFuncionarios();

if (isset($_POST['tarefa']) && isset($_POST['destinatario']) && isset($_POST['assunto'])) {

	$tarefa = $_POST['tarefa'];
	$id_funcionario_remetente = $_SESSION['id_funcionario'];
	$id_funcionario_destinatario = $tarefacontroller->returnIdByNome($_POST['destinatario']);
	$assunto = $_POST['assunto'];
	$data_fim = $_POST['data_fim'];
	//echo "$tarefa  -  $id_funcionario_remetente - $id_funcionario_destinatario - $assunto - $data_fim"; exit;
	$tarefacontroller->EnviaTarefa($tarefa, $data_fim, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto);
}

?>

<body>

<h2>Enviar Tarefa</h2>

<div class="container">

	<form method="POST">
		<div class="form-group">
			<div class="row">
				Para: 
				<select class="form-control" name="destinatario">	
					<option>---</option>
					<?php  

					foreach ($funcionarios as $key => $value) {
							$nome = $value['nome'];
							echo "<option value=$nome> ". $nome ." </option>";
						}	

					?>

				</select>
			</div>

			<div class="row">
				Assunto:
				<input type="text" name="assunto" class="form-control">
			</div>
			<br>
			<div class="row">
				<textarea name="tarefa" class="form-control"></textarea>
			</div>
			Prazo: <input type="date" name="data_fim" class="form-control">

			<br>
			<button type="submit" class="btn btn-primary btn-lg botao">Enviar</button>
		</div>
	</form>
</div>


</body>	
</html>