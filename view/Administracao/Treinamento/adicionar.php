<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TreinamentoController.php");


if (isset($_POST['descricao'])) {

	$treinamento = new TreinamentoController();
	$descricao = $_POST['descricao'];
	$id_responsavel = $_SESSION['id_funcionario'];

	$treinamento->Add($_POST['descricao'], $_SESSION['id_funcionario']);

}


?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Novo Treinamento</h2>
				<hr>
			</div>
		</div>

		<div class="col-md-5">
			<form method="POST">
				<div class="form-group">
					Nome: <input type="text" class="form-control" name="descricao" required>
				
					
					<button type="submit" class="btn btn-success">Cadastrar</button> <br> <br>
					<button type="submit" class="btn btn-default"><a  href="/OdontoSystem/view/Administracao/Treinamento/index.php" >Voltar</a></button>
				</div>
			</form>
		</div>

		<div class="col-md-5">
			<div class="panel">
				<div class=></div>

			</div>
		</div>
	</div>




</body>
<?php
	require_once("../../footer.php");
?>
</html>