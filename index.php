<?php

require_once 'controladores/rutas.controlador.php';
require_once 'controladores/users.controlador.php';
require_once 'modulos/users.modelo.php';


$rutas = new ControladorRutas();
$rutas->inicio();


?>