<?php
session_start();

if (!(isset($_SESSION['nome']) && isset($_SESSION['id_funcionario']))) {

    header("Location: /OdontoSystem/index.php");

}

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/CargoController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/FuncionarioController.php");

$funcionariocontroller = new FuncionarioController();

$funcionario = $funcionariocontroller->GetFuncionarioById($_SESSION['id_funcionario']);

$cargocontroller = new CargoController();

$cargo = $cargocontroller->GetCargoById($funcionario['id_cargo']);
?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OdontoSystem</title>

    <!-- Bootstrap Core CSS -->
    <link href="/OdontoSystem/resources/css/bootstrap.min.css" rel="stylesheet">

     <link href="/OdontoSystem/resources/css/bootstrap2.css" rel="stylesheet">
     <!-- MetisMenu CSS -->
    <link href="/OdontoSystem/resources/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/OdontoSystem/resources/css/sb-admin-2.css" rel="stylesheet">

    <link href="/OdontoSystem/resources/css/layoutcss.css" rel="stylesheet">
    <div>
	    <table class="cardTitle">
			<tr >
				<td > <h1 style ="font-weight: 600; text-shadow: 2px 2px #ddd;"> OdontoSystem </h1></td>
				<td style = "text-align: right;"> Bem Vindo, <?php echo  $_SESSION['nome'];?>. </td>
				<td style = "text-align: center;"> <a href="/OdontoSystem/view/logout.php" >Sair</a></td>
			</tr>	
		</table>

    <style >
        .disabled {
          pointer-events: none;
          cursor: default;
          opacity: 0.6;
        }
    </style>


    </div>
    <div class="navbar">

        <a href = "/OdontoSystem/view/Home.php"> Início  </a> 
        <a href = "/OdontoSystem/view/Mensagem/caixa_entrada.php"> Mensagens  </a> 
        <a href = "/OdontoSystem/view/Tarefa/caixa_entrada.php"> Tarefas  </a> 
        <a href = "/OdontoSystem/view/Treinamento/caixa_entrada.php"> Treinamentos  </a> 
        <?php 
            if ($cargo['cargo'] == 'RH' or $cargo['cargo'] == 'CEO') {
                echo "<a href = '/OdontoSystem/view/Administracao/HomeAdministracao.php'> Administração  </a> "; 

            }
            else {
                echo "<a href = '/OdontoSystem/view/Administracao/HomeAdministracao.php' class='disabled'> Administração  </a> "; 
            }
        ?> 
        <a href="/OdontoSystem/view/logout.php">Sair</a>
    </div>
 
 
</head>
