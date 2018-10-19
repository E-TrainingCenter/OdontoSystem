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
                <div class="panel-body">
                <h4>Tarefas Excluidas</h4>
                    <p>
                        <a href="/OdontoSystem/view/Tarefa/nova_tarefa.php" class="btn btn-primary btn-lg botao">Nova Tarefa</button><br>
                        <a href="/OdontoSystem/view/Tarefa/caixa_entrada.php" class="btn btn-primary btn-lg botao">Caixa de Entrada</button><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_enviadas.php" class="btn btn-primary btn-lg botao">Tarefas Enviadas</button><br>
                        <a href="/OdontoSystem/view/Tarefa/tarefas_excluidas.php" class="btn btn-primary btn-lg botao">Tarefas Excluídas</button><br>
                        <a href="#" class="btn btn-primary btn-lg botao">Excluir</a><br>
                        <br>
                        <br>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding">
                        Tarefas Excluidas
                    </div>
                    <div class="panel-body">

                        <?php 

                            foreach ($tarefas as $key => $value) {
                                
                                $nome_remetente = $tarefacontroller->returnNomeById($value['id_funcionario_destinatario']);
                                $id_tarefa = $value['id_tarefa'];
                                echo "<a href='/OdontoSystem/view/Tarefa/visualizar_tarefa.php?id=$id_tarefa'> ". $nome_remetente . " || " . $value['assunto'] ." </a><br>";
                               
                            }   
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
