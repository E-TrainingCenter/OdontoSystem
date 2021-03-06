
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

if (isset($_GET['id_mensagem_resposta'])) {

	$msg = $mensagemcontroller->GetMensagemById($_GET['id_mensagem_resposta']);

	$funcionario = $mensagemcontroller->returnNomeById($msg['id_funcionario_remetente']);
	
	$assunto = $msg['assunto'];

}

?>

<body>

<h2 class= "title">Enviar Mensagem</h2>

<div class="container">

	<form method="POST">
		<div class="form-group">
			<div class="row">

				Para Funcionario: 
				<select required class="form-control" name="destinatario">	
					
					<?php  
					if (isset($_GET['id_mensagem_resposta'])) {

						echo "<option value=$funcionario>$funcionario</option>";

					}
					else {
					echo "<option>---</option>";
					foreach ($funcionarios as $key => $value) {
							$nome = $value['nome'];
							echo "<option value=$nome> ". $nome ." </option>";
						}	
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

				Assunto:
				<?php
					if (isset($assunto) && $assunto = $msg['assunto']) {
						echo "<input value=$assunto type='text' name='assunto' class='form-control' required>";		
					}
					else 
						echo "<input type='text' name='assunto' class='form-control'>";
				?>

			</div>
			<br>
			<div class="row">
				<h3>Mensagem:</h3>
				<textarea name="mensagem" class="form-control" required></textarea>
			</div>
			<br>
			<div class = "row">
				<button type="submit" class="btn btn-primary btn-lg botao" style="width: 20vh">Enviar</button>
				<a href="/OdontoSystem/view/Mensagem/caixa_entrada.php" style = "margin-left: 20px;"><h4> Voltar </h4></a>
		    </div>
		</div>
	</form>
</div>


</body>	
<?php
	require_once("../footer.php");
?>
</html>