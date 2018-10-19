<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/view/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/GrupoController.php");

if (isset($_POST['descricao'])) {


	$grupocontroller = new GrupoController();

	$grupocontroller->CadastrarGrupo($nome, $cpf, $endereco, $id_cargo, $sexo, $senha);

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
					Nome: <input type="text" class="form-control" name="descricao">
					Ativo <input type="radio" name="ativo" name="1"> Inativo <input type="radio" name="ativo" value="0"><br>
					
					<button type="submit" class="btn btn-success">Cadastrar</button> <br> <br>
					<button href="/OdontoSystem/view/Administracao/Funcionario/index.php" class="btn btn-default">Voltar</button>
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
                         
                            <tr>
                           
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                            </td>
                            </tr>
                     
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
                         
                            <th>Nome do Produto</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            <tr>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                            </td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>

</section>
<!-- /.content -->



</body>
</html>