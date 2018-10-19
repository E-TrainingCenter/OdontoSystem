<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
	require_once("../header.php");

	$id_mensagem = $_GET['id'];

	$mensagemcontroller = new MensagemController();
	$msg = $mensagemcontroller->GetMensagemById($id_mensagem);

	$nome = $mensagemcontroller->returnNomeById($msg['id_funcionario_remetente']);

?>


<body>
	<h2>Mensagem</h2>
	
	<div class="container">
		<div class="row">
			De: <input type="text" value=<?=$nome?> class="form-control">
		</div>

		<div class="row">
			Assunto: <input type="text" value=<?=$msg['assunto']?> class="form-control">
		</div>
		<br>
		<div class="row">
			<textarea class="form-control"> <?=$msg['mensagem']?> </textarea>
		</div>
		<br>
		<button class="btn btn-primary btn-lg botao">Responder</button>
		<button class="btn btn-default btn-lg botao"><a href="/OdontoSystem/view/Mensagem/caixa_entrada.php">Voltar</a></button>
	</div>

</body>
</html>