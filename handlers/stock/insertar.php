<?php

require_once(__DIR__.'/productos.php');

/**
 * 
 * @KEVAO18
 * 
 */

if (isset($_POST['nombre']) && $_POST['nombre'] != "") {
    $productos = new productos();

    $productos->insertarDatos(
        "'".$_POST['nombre']."'", 
        "'".$_POST['referencia']."'", 
        "'".$_POST['precio']."'", 
        "'".$_POST['peso']."'", 
        "'".$_POST['categoria']."'", 
        "'".$_POST['stock']."'", 
        "'".$_POST['fecha']."'"
    );
    

}else{
    ?>
    <script>
        alert("Error: datos erroneos");
    </script>
    <?php
}

header("Location: ../../productos");
?>