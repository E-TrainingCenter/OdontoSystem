<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/controller/MensagemController.php");
require_once("../header.php");

$mensagemcontroller = new MensagemController();

$msgs = $mensagemcontroller->listEnviadas();

var_dump($msgs);

?>