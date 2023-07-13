<?php

require_once ('productos.php');



/**
 * 
 * @KEVAO18
 * 
 */

$productos = new productos();

$productos->eliminarDatos('id', $_GET['id']);

header("Location: ../../productos");