<?php
session_start();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="/OdontoSystem/resources/css/bootstrap.min.css" rel="stylesheet">

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
        <a href = "http://localhost:8080/OdontoSystem/view/Home.php"> Início  </a> 
        <a href = "Mensagem/caixa_entrada.php"> Mensagens  </a> 
        <a href = "Tarefa/caixa_entrada.php"> Tarefas  </a> 
        <a href = "#Treinamentos"> Treinamentos  </a> 
        <a href = "#Administração"> Administração  </a>   
       
    </div>
 
 
</head>
