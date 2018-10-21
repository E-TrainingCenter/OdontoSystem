<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TreinamentoController.php");
require_once("../header.php");

$treinamentocontroller = new TreinamentoController();

$treinamentos = $treinamentocontroller->listAll();
?>

<body>

    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="panel-body">
                <h4>Treinamento</h4>
                    <p>
                        <a href="/OdontoSystem/view/Treinamento/caixa_entrada.php" class="btn btn-primary btn-lg botao">Caixa de Entrada</button><br>
                        <a href="#" class="btn btn-primary btn-lg botao">Arquivar</a><br>
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

                    </div>
                </div>

            </div>
        </div>

    </div>



</body>


</html>