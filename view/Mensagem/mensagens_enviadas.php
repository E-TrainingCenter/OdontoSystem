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
                <div class="panel-body">
                <h4>Mensagens Enviadas</h4>
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
                        Mensagens Enviadas
                    </div>
                    <div class="panel-body">

                        <?php 

                            foreach ($msgs as $key => $value) {
                                
                                $nome_remetente = $mensagemcontroller->returnNomeById($value['id_funcionario_destinatario']);
                                $id_mensagem = $value['id_mensagem'];

                                if ($value['visualizado'] == 0) 
                                    $visualizado = 'Não visualizado';
                                else
                                    $visualizado = 'Visualizado';

                                echo "<a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'> ". $nome_remetente . " || " . $value['assunto'] ." || ". $visualizado . "</a><br>";
                               
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
