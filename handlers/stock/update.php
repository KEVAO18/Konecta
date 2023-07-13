<?php

require_once(__DIR__.'/productos.php');

/**
 * 
 * @KEVAO18
 * 
 */

    $productos = new productos();
    
    $productos->actualizarDatos('Nombre ', "'".$_POST['id']."'", $_POST['nombre']);

    $productos->actualizarDatos('Referencia ', "'".$_POST['id']."'", $_POST['referencia']);
    
    $productos->actualizarDatos('Categoria ', "'".$_POST['id']."'", $_POST['categoria']);
    
    $productos->actualizarDatos('Precio ', "'".$_POST['id']."'", $_POST['precio']);
    
    $productos->actualizarDatos('Peso ', "'".$_POST['id']."'", $_POST['peso']);
    
    $productos->actualizarDatos('Stock ', "'".$_POST['id']."'", $_POST['stock']);
    
    $productos->actualizarDatos('FechaCreacion ', "'".$_POST['id']."'", $_POST['fecha']);

    header("Location: ../../productos");


?>