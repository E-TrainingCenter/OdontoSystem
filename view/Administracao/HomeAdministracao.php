<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");



?>

<body>

<div class="container" >
	<div class="row">
	    <div style ="width: 100%">
	        <h3 class="title">Área Administrativa</h3>
	    </div>
	</div>
	<br>

	<div class="row">
	    <div class="cardAdm">
	        <a href="/OdontoSystem/view/Administracao/Funcionario/index.php"><h3>FUNCIONARIOS</h3></a>
	    </div>

	    <div class=" cardAdm">
	       <a href="/OdontoSystem/view/Administracao/Grupo/index.php"><h3>GRUPOS</h3></a>
	    </div>

	    <div class=" cardAdm">
	       <a href="/OdontoSystem/view/Administracao/Treinamento/index.php"> <h3>TREINAMENTOS</h3></a>
	    </div>
	</div>
	<br>
	<div class = "row"> 
		<div class=" cardAdm">
	       <a href="/OdontoSystem/view/Administracao/Questao/index.php"> <h3>QUESTOES</h3></a>
	    </div>
	</div>

</div>

</body>
<?php
	require_once("../footer.php");
?>
</html>