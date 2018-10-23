<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
require_once("../header.php");

$mensagemcontroller = new MensagemController();

$msgs = $mensagemcontroller->listEnviadas();

?>
<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body backgroundMenuSide">
           
                    <p>
                        <a href="/OdontoSystem/view/Mensagem/nova_mensagem.php" class="btn btn-primary btn-lg botao menuSide">Nova Mensagem</a><br>
                        <a href="/OdontoSystem/view/Mensagem/caixa_entrada.php" class="btn btn-primary btn-lg botao menuSide">Caixa de Entrada</a><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_enviadas.php" class="btn btn-primary btn-lg botao menuSide">Mensagens Enviadas</a><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_excluidas.php" class="btn btn-primary btn-lg botao menuSide">Excluídas</a><br>
                    </p>
                </div>
            </div>    
        

        
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-heding title">
                        Mensagens Enviadas
                    </div>
                    <div class="panel-body">
                        <table style="width:100%">
                          <tr>
                          <th> Remetente </th>
                          <th> Assunto </th>
                          <th> Status </th>
                          
                          </tr>

                        <?php 

                            foreach ($msgs as $key => $value) {
                                
                                $nome_remetente = $mensagemcontroller->returnNomeById($value['id_funcionario_destinatario']);
                                $id_mensagem = $value['id_mensagem'];

                                if ($value['visualizado'] == 0) 
                                    $visualizado = 'Não visualizado';
                                else
                                    $visualizado = 'Visualizado';

                                echo "<tr><td><a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>". $nome_remetente . "</a></td> <td><a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>" . $value['assunto'] ."</a></td> <td><a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>". $visualizado . "</a></td> </tr>";
                               
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
