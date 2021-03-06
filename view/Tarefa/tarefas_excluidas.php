<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
require_once("../header.php");

$tarefacontroller = new TarefaController();

$tarefas = $tarefacontroller->listExcluidos();

?>

<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body backgroundMenuSide">
                     <p>
                        <a href="/OdontoSystem/view/Tarefa/nova_tarefa.php" class="btn btn-primary btn-lg botao menuSide">Nova Tarefa</a><br>
                        <a href="/OdontoSystem/view/Tarefa/caixa_entrada.php" class="btn btn-primary btn-lg botao menuSide">Caixa de Entrada</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_enviadas.php" class="btn btn-primary btn-lg botao menuSide">Tarefas Enviadas</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_excluidas.php" class="btn btn-primary btn-lg botao menuSide">Tarefas Finalizadas</a>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding title">
                        Tarefas Finalizadas
                    </div>
                    <div class="panel-body">
                        <table style="width:100%">
                          <tr>
                          <th> Remetente </th>
                          <th> Assunto </th>
                                              
                          </tr>

                        <?php 

                            foreach ($tarefas as $key => $value) {
                                
                                $nome_remetente = $tarefacontroller->returnNomeById($value['id_funcionario_remetente']);
                                $id_tarefa = $value['id_tarefa'];
                                echo "<tr><td><a href='/OdontoSystem/view/Tarefa/visualizar_tarefa.php?id=$id_tarefa&finalizada=true'> ". $nome_remetente . "</a></td> <td> " . $value['assunto'] ." </td></tr>";
                               
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
