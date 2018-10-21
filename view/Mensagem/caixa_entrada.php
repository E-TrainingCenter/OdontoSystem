<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
require_once("../header.php");

$mensagemcontroller = new MensagemController();

$msgs = $mensagemcontroller->listAll();


?>

<body>

    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body">
                <h4>Mensagens</h4>
                    <p>
                        <a href="/OdontoSystem/view/Mensagem/nova_mensagem.php" class="btn btn-primary btn-lg botao">Nova Mensagem</button><br>
                        <a href="/OdontoSystem/view/Mensagem/caixa_entrada.php" class="btn btn-primary btn-lg botao">Caixa de Entrada</button><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_enviadas.php" class="btn btn-primary btn-lg botao">Mensagens Enviadas</button><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_excluidas.php" class="btn btn-primary btn-lg botao">Excluídas</button><br>
                        <a href="#" class="btn btn-primary btn-lg botao">Excluir</a><br>
                        <br>
                        <br>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding">
                        Caixa de Entrada
                    </div>
                    <div class="panel-body">


                        <table style="width:100%">
                          <tr>
                          <th> Remetente </th>
                          <th> Assunto </th>
                          <th> Data </th>
                          </tr>
                        <?php 

                            foreach ($msgs as $key => $value) {
                                
                                $nome_remetente = $mensagemcontroller->returnNomeById($value['id_funcionario_remetente']);
                                $id_mensagem = $value['id_mensagem'];
                                $data = $value['data'];
                                echo "<tr><td> ". $nome_remetente . " </td> <td> <a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>" . $value['assunto'] ." </a><br></td><td>$data</td> </th>";
                               
                            }   
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>



</body>


</html>