<?php

require_once "controller/rutasController.php";
require_once "controller/cursosController.php";
require_once "controller/clientesController.php";
require_once "models/clientesModels.php";
require_once "models/cursosModels.php";

$rutas = new ControllerRuta();
$rutas->inicio();