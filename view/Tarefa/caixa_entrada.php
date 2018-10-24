<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
require_once("../header.php");

$tarefacontroller = new TarefaController();

$tarefas = $tarefacontroller->listAll();
?>

<body>

    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body backgroundMenuSide">
                    <p>
                        <a href="/OdontoSystem/view/Tarefa/nova_tarefa.php" class="btn btn-primary btn-lg botao menuSide">Nova Tarefa</a><br>
                        <a href="/OdontoSystem/view/Tarefa/caixa_entrada.php" class="btn btn-primary btn-lg botao  menuSide">Caixa de Entrada</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_enviadas.php" class="btn btn-primary btn-lg botao  menuSide">Tarefas Enviadas</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_excluidas.php" class="btn btn-primary btn-lg botao  menuSide">Tarefas Excluídas</a>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding">
                       <h3 class="title"> Caixa de Entrada </h3>
                    </div>
                    <div class="panel-body">
                          <table style="width:100%">
                          <tr>
                          <th> Remetente </th>
                          <th> Assunto </th>
                          <th> Status </th>
                          <th> Prazo </th>
                          </tr>
                        <?php 
                            foreach ($tarefas as $key => $value) {
                                $nome_remetente = $tarefacontroller->returnNomeById($value['id_funcionario_remetente']);
                                $id_tarefa = $value['id_tarefa'];
                                $data = $value['data_fim'];
                                $status = $value['status'];
                                echo "<tr><th> ". $nome_remetente . " </th><th><a href='/OdontoSystem/view/Tarefa/visualizar_tarefa.php?id=$id_tarefa&funcionario=destinatario'>" . $value['assunto'] ." </a></th><td>$status</td><td>$data</td></tr>";
                               
                            }   
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>



</body>
<?php
	require_once("../footer.php");
?>

</html>