<?php
session_start();

if (!(isset($_SESSION['nome']) && isset($_SESSION['id_funcionario']))) {

    header("Location: /OdontoSystem/index.php");

}

?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="/OdontoSystem/resources/css/bootstrap.min.css" rel="stylesheet">

     <link href="/OdontoSystem/resources/css/bootstrap2.css" rel="stylesheet">
     <!-- MetisMenu CSS -->
    <link href="/OdontoSystem/resources/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/OdontoSystem/resources/css/sb-admin-2.css" rel="stylesheet">

    <link href="/OdontoSystem/resources/css/layoutcss.css" rel="stylesheet">
    <div>
	    <table>
			<tr style = "width: 100vw;">
				<td style = "width: 60vw;"> <h3> OdontoSystem </h3></td>
				<td style = "width: 36vw; text-align: right;"> Bem Vindo, <?php echo  $_SESSION['nome'];?>. </td>
				<td style = "width: 3vw; text-align: right;">    <a href="#Sair" >Sair</a></td>
			</tr>	
		</table>
				  	


    </div>
    <div class="navbar">

        <a href = "/OdontoSystem/view/Home.php"> Início  </a> 
        <a href = "/OdontoSystem/view/Mensagem/caixa_entrada.php"> Mensagens  </a> 
        <a href = "/OdontoSystem/view/Tarefa/caixa_entrada.php"> Tarefas  </a> 
        <a href = "#"> Treinamentos  </a> 
        <a href = "/OdontoSystem/view/Administracao/HomeAdministracao.php"> Administração  </a>   
        <a href="#Sair">Sair</a>
    </div>
 
 
</head>
