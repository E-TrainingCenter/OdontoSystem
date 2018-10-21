<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/GrupoController.php");


if (isset($_POST['descricao'])) {

	$grupocontroller = new GrupoController();

	$grupocontroller->CadastrarGrupo($_POST['descricao']);

}


?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Novo Grupo</h2>
				<hr>
			</div>
		</div>

		<div class="col-md-5">
			<form method="POST">
				<div class="form-group">
					Nome: <input type="text" class="form-control" name="descricao" required>
					Ativo <input type="radio" name="ativo" name="1"> Inativo <input type="radio" name="ativo" value="0"><br>
					
					<button type="submit" class="btn btn-success">Cadastrar</button> <br> <br>
					<button type="submit" class="btn btn-default"><a  href="/OdontoSystem/view/Administracao/Grupo/index.php" >Voltar</a></button>
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
</html>