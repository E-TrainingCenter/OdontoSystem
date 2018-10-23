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
                <div class="panel-body backgroundMenuSide">
                    <p>
                        <a href="/OdontoSystem/view/Mensagem/nova_mensagem.php" class="btn btn-primary btn-lg botao menuSide">Nova Mensagem</a><br>
                        <a href="/OdontoSystem/view/Mensagem/caixa_entrada.php" class="btn btn-primary btn-lg botao menuSide">Caixa de Entrada</a><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_enviadas.php" class="btn btn-primary btn-lg botao menuSide">Mensagens Enviadas</a><br>
                        <a href="/OdontoSystem/view/Mensagem/mensagens_excluidas.php" class="btn btn-primary btn-lg botao menuSide">Excluídas</a>
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
                          <th> Data </th>
                          </tr>
                        <?php 

                            foreach ($msgs as $key => $value) {
                                
                                $nome_remetente = $mensagemcontroller->returnNomeById($value['id_funcionario_remetente']);
                                $id_mensagem = $value['id_mensagem'];
                                $data = $value['data'];
                                if ($value['visualizado'] == 0) {
                                    echo "<tr bgcolor='#b2e8b2'><td> ". $nome_remetente . " </td> <td> <a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>" . $value['assunto'] ." </a><br></td><td>$data</td> </th>";
                               }
                               else if ($value['visualizado'] == 1) {
                                     echo "<tr><td> ". $nome_remetente . " </td> <td> <a href='/OdontoSystem/view/Mensagem/visualizar_mensagem.php?id=$id_mensagem'>" . $value['assunto'] ." </a><br></td><td>$data</td> </th>";
                               }
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