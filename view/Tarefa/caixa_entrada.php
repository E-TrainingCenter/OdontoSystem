<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/TarefaController.php");
require_once("../header.php");

$tarefacontroller = new TarefaController();
$tarefa = $tarefacontroller->listAll();

var_dump($tarefa);


?>