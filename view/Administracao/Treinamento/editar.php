<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TreinamentoController.php");


if (isset($_GET['id_editar'])) {

	$treinamentocontroller = new TreinamentoController();

	$treinamento = $treinamentocontroller->returnTreinamentoById($_GET['id_editar']);

	$disponiveis = $treinamentocontroller->funcionariosDisponiveis($_GET['id_editar']);

    $indisponiveis = $treinamentocontroller->funcionariosIndisponiveis($_GET['id_editar']);
}

if (isset($_GET['id_funcionario']) && isset($_GET['id_treinamento'])) {
    

    $treinamentocontroller = new TreinamentoController();

    $treinamentocontroller->addFuncionario($_GET['id_funcionario'], $_GET['id_treinamento']);
}

if (isset($_GET['id_remove']) && $_GET['id_treinamento']) {

    $treinamentocontroller = new TreinamentoController();

    $treinamentocontroller->removeFuncionario($_GET['id_remove'], $_GET['id_treinamento']);
}

?>

<body>

	<div class="container">
		<div class="row" >
			<div class="col-md-offset-3">
				<h2>Área Administrativa - Editar Treinamento</h2>
				<hr>
			</div>
		</div>

		<div class="col-md-5">
			<form method="POST">
				<div class="form-group">
					Nome: <input type="text" class="form-control" name="descricao" value=<?=$treinamento['descricao']?>>
					
					
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


	<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Funcionarios disponiveis</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            
                            <th>Funcionario</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbodx	y>
                         
                            
                           <?php
                           		foreach ($disponiveis as $key => $value) {
                           			echo "<tr>";
                           			$nome = $value['nome'];
                                    $id_funcionario = $value['id_funcionario'];
                                    $id_treinamento = $treinamento['id_treinamento']; 
                           			echo "<td>$nome</td>";	
                           		
                 					echo "<td> <a href='/OdontoSystem/view/Administracao/Treinamento/editar.php?id_funcionario=$id_funcionario&id_treinamento=$id_treinamento' class='btn btn-primary btn-xs pull-right'><i class='fa fa-arrow-right'></i> Adicionar</a> </td>";
                            		
                            		echo "</tr>";
                                }
                     		?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Funcionarios no Grupo </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                         
                            <th>Funcionario</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($indisponiveis as $key => $value) {                                
                                    echo "<tr>";
                                    $nome = $value['nome'];
                                    $id_funcionario = $value['id_funcionario'];
                                    $id_treinamento = $treinamento['id_treinamento']; 
                                    echo "<td>$nome</td>";  
                                
                                    echo "<td> <a href='/OdontoSystem/view/Administracao/Treinamento/editar.php?id_remove=$id_funcionario&id_treinamento=$id_treinamento' class='btn btn-primary btn-xs pull-right'><i class='fa fa-arrow-right'></i> Remover</a> </td>";
                                    
                                    echo "</tr>";
                                }
                            ?>                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>

</section>
<!-- /.content -->




</body>
<?php
	require_once("../../footer.php");
?>
</html>