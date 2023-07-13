<?php

try {
    @require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    require_once ('../../controllers/sqlController.php');
}

/**
 * 
 * @KEVAO18
 * 
 */
class venta extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('facturas');
    }

    public function insertarDatos($producto_id, $unidades){
        $this->datos->insert(
            'ventas', 
            '`id`, `producto_id`, `unidades`', 
            "NULL, ".$producto_id.", ".$unidades
        );
    }

    public function leftJoinV(){
        return $this->datos->leftJoin(
            "ventas", 
            "
                ventas.id, 
                productos.Nombre, 
                ventas.unidades
            ",
            "productos",
            "ventas.producto_id",
            "productos.ID"
        );
    }

}




?>