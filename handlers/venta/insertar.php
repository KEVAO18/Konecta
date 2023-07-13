<?php

require_once(__DIR__.'/venta.php');

require_once(__DIR__.'/../stock/productos.php');

/**
 * 
 * @KEVAO18
 * 
 */

if (isset($_POST['prod']) && isset($_POST['cantidad']) && ($_POST['cantidad'] > 0)) {
    
    $venta = new venta();

    $producto = new productos();

    $productoComprado = $producto->onlyOne($_POST['prod']);

    $flag = false;

    foreach ($productoComprado as $p) {
        if(($p["Stock"] > 0) && ($p["Stock"] > $_POST['cantidad'])){

            $flag = true;

            $producto->actualizarDatos("Stock", $_POST["prod"], $p["Stock"]  - $_POST['cantidad']);

            $venta->insertarDatos(
                "'".$_POST['prod']."'", 
                "'".$_POST['cantidad']."'",
            );
            
        }
    }

    if ($flag) {

        header("Location: ../../productos/");

    }else{

        header("Refresh: 1; URL=../../productos/");
        
        ?>
        <script>
            alert("Error: Producto sin existencias para cumplir la demanda");
        </script>
        <?php
    }

}else{

    header("Refresh: 1; URL=../../productos/");
    
    ?>
    <script>
        alert("Error: datos erroneos");
    </script>
    <?php

}

?>