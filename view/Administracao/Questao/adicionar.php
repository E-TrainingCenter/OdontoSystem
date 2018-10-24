<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/QuestaoController.php");

if (isset($_POST['pergunta']) && isset($_POST['alternativa1']) && isset($_POST['alternativa2']) && isset($_POST['alternativa3']) && isset($_POST['alternativa4']) && isset($_POST['resposta'])) {

	$pergunta = $_POST['pergunta'];
	$alternativa1 = $_POST['alternativa1'];
	$alternativa2 = $_POST['alternativa2'];
	$alternativa3 = $_POST['alternativa3'];
	$alternativa4 = $_POST['alternativa4'];	
	$resposta = $_POST['resposta'];

	$questaocontroller = new QuestaoController();
	
	$questaocontroller->AdicionarQuestao($pergunta, $alternativa1, $alternativa2, $alternativa3, $alternativa4, $resposta);

}

?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Nova Questao</h2>
				<hr>
			</div>
		</div>

		<form method="POST">
			<div class="form-group">
				
				<div class ="row"> 
					pergunta: <input required type="text" name="pergunta" class="form-control">
				</div>
				<br>
				<div class="row">
					Alternativa 1 <input required type="text" name="alternativa1" class="form-control">
				</div>
				<br>

				<div class="row">
					Alternativa 2 <input required type="text" name="alternativa2" class="form-control">
				</div>
				<br>

				<div class="row">
					Alternativa 3 <input required type="text" name="alternativa3" class="form-control">
				</div>
				<br>				
				<div class="row">
					Alternativa 4 <input required type="text" name="alternativa4" class="form-control">
				</div>
				<br>
				
				<div class="row">
					Resposta: 
					<select required class="form-control" name="resposta">	
						<option value="1">1</option>
  						<option value="2">2</option>
 						<option value="3">3</option>
  						<option value="4">4</option>
					</select>
				</div>
				<br>

				<div class="row">
					<button type="submit" class="btn btn-success">Cadastrar</button> 
					<button href="/OdontoSystem/view/Administracao/Funcionario/index.php" class="btn btn-default">Voltar</button>
				</div>
			</div>
		</form>
	</div>


</body>

<?php
	require_once("../../footer.php");
?>
</html>