<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
require_once("../header.php");

$tarefacontroller = new TarefaController();

$tarefas = $tarefacontroller->listEnviadas();

?>
<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body backgroundMenuSide">
                    <p>
                        <a href="/OdontoSystem/view/Tarefa/nova_tarefa.php" class="btn btn-primary btn-lg botao menuSide">Nova Tarefas</a><br>
                        <a href="/OdontoSystem/view/Tarefa/caixa_entrada.php" class="btn btn-primary btn-lg botao menuSide">Caixa de Entrada</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_enviadas.php" class="btn btn-primary btn-lg botao menuSide">Tarefas Enviadas</a><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_excluidas.php" class="btn btn-primary btn-lg botao menuSide">Tarefas Finalizadas</a>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding title">
                        Tarefas Enviadas
                    </div>
                    <div class="panel-body">
                        <table style="width:100%">
                          <tr>
                          <th> Destinatario </th>
                          <th> Assunto </th>
                          <th>Status</th>
                    
                          </tr>

                        <?php 

                            foreach ($tarefas as $key => $value) {
                                
                                $nome_remetente = $tarefacontroller->returnNomeById($value['id_funcionario_destinatario']);
                                $id_tarefa = $value['id_tarefa'];
                                $status = $value['status'];
                                echo "<tr> <td>". $nome_remetente . "</td><td><a href='/OdontoSystem/view/Tarefa/visualizar_tarefa.php?id=$id_tarefa&funcionario=remetente'>" . $value['assunto'] ." </a></td><td>$status</td></tr>";
                               
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
