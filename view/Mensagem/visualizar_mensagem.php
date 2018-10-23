<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
	require_once("../header.php");

if (isset($_GET['id'])) {
	$id_mensagem = $_GET['id'];

	$mensagemcontroller = new MensagemController();
	$msg = $mensagemcontroller->GetMensagemById($id_mensagem);

	$nome = $mensagemcontroller->returnNomeById($msg['id_funcionario_remetente']);

	$id_mensagem = $msg['id_mensagem'];
}

?>


<body>
	<h2><center>Mensagem</center></h2>
	
	<div class="container">
		<div class="row">
			<h3>De: </h3><input type="text" readonly="true" value=<?=$nome?> class="form-control">
		</div>

		<div class="row">

			<h3>Assunto:</h3> <input type="text" readonly="true" value=<?=$msg['assunto']?> class="form-control">

		</div>
		<br>
		<div class="row">
			<h3> Mensagem </h3>
			<textarea class="form-control" readonly="true"> <?=$msg['mensagem']?> </textarea>
		</div>
		<br>

		<div class="row">
		<?php 
			
			echo "<a href='/OdontoSystem/view/Mensagem/nova_mensagem.php?id_mensagem_resposta=$id_mensagem'><button class='btn btn-primary btn-lg botao' style = 'width: 20vh;'>Responder</button></a>"; 
		?>
		<a href="/OdontoSystem/view/Mensagem/caixa_entrada.php" style="margin-left: 20px;"><h4>Voltar</h4></a>

	</div>
	</div>

	

</body>
<?php
	require_once("../footer.php");
?>
</html>