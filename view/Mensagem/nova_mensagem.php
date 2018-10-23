
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/GrupoController.php");
require_once("../header.php");

$mensagemcontroller = new MensagemController();

$funcionarios = $mensagemcontroller->listAllFuncionarios();
$grupos = $mensagemcontroller->listAllGrupos();

if (isset($_POST['mensagem']) && isset($_POST['destinatario']) && isset($_POST['assunto']) && $_POST['destinatario'] != '---') {

	$mensagem = $_POST['mensagem'];
	$id_funcionario_remetente = $_SESSION['id_funcionario'];
	$id_funcionario_destinatario = $mensagemcontroller->returnIdByNome($_POST['destinatario']);
	$assunto = $_POST['assunto'];

	$mensagemcontroller->EnviaMensagem($mensagem, $id_funcionario_remetente, $id_funcionario_destinatario, $assunto);
}

if (isset($_POST['mensagem']) && isset($_POST['destinatario-grupo']) && isset($_POST['assunto'])) {

	$mensagem = $_POST['mensagem'];
	$id_funcionario_remetente = $_SESSION['id_funcionario'];
	$id_grupo_destinatario = $_POST['destinatario-grupo'];
	$assunto = $_POST['assunto'];

	$mensagemcontroller->EnviaMensagemGrupo($mensagem, $id_funcionario_remetente, $id_grupo_destinatario, $assunto);
}

?>

<body>

<h2 class= "title">Enviar Mensagem</h2>

<div class="container">

	<form method="POST">
		<div class="form-group">
			<div class="row">
				<h3>Para Funcionario: </h3>
				<select class="form-control" name="destinatario" >	
					<option>---</option>
					<?php  

					foreach ($funcionarios as $key => $value) {
							$nome = $value['nome'];
							echo "<option value=$nome> ". $nome ." </option>";
						}	

					?>

				</select>

				<h3>Para Grupo de Funcionarios:</h3>
				 <select class="form-control" name="destinatario-grupo" >	
					<option>---</option>
					<?php  

					foreach ($grupos as $key => $value) {
							$descricao = $value['descricao'];
							$id_grupo = $value['id_grupo'];
							echo "<option value=$id_grupo> ". $descricao ." </option>";
						}	

					?>

				</select>
			</div>

			<div class="row">
				<h3>Assunto:</h3>
				<input type="text" name="assunto" class="form-control" required>
			</div>
			<br>
			<div class="row">
				<h3>Mensagem:</h3>
				<textarea name="mensagem" class="form-control" required></textarea>
			</div>
			<br>
			<div>
				<button type="submit" class="btn btn-primary btn-lg botao" style="width: 20vh">Enviar</button>
				<a href="/OdontoSystem/view/Mensagem/caixa_entrada.php"><h4> Voltar </h4></a>
		    </div>
		</div>
	</form>
</div>


</body>	
<?php
	require_once("../footer.php");
?>
</html>