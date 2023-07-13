<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function venta(){
    
    @require_once('../handlers/venta/venta.php');

    @require_once('../handlers/stock/productos.php');

    $venta = new venta();

    $productos = new productos();

    $prods = $productos->column("ID, Nombre, Stock");

    $datos = $venta->leftJoinV();

    ?>

    <section>
        <article class="card p-4" id="insert-form">
        <form action="<?=$_ENV['PAGE_SERVE']?>handlers/venta/insertar.php" method="post">
            <input type="hidden" name="stock" value="<??>">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-select" aria-label="id" name="prod">
                    <?php
                        foreach ($prods as $p) {
                            // if($p['Stock'] > 0){
                    ?>
                        <option value="<?=$p['ID']?>"><?=$p['Nombre']." - ".$p['ID']?></option>
                    <?php
                            // }
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="cantLabel" for="cantidad">Cantidad</span>
                        <input type="number" class="form-control" maxlength="9" id="cantidad" aria-describedby="cantLabel" name="cantidad">
                    </div>
                </div>
            </div>
            <div class="d-grid gap-4 py-2 px-4">
                <button type="submit" class="btn btn-outline-success">Añadir Venta</button>
            </div>
        </form>
        </article>
        <hr>
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="ID">ID</th>
                        <th scope="Nombre">Nombre de producto</th>
                        <th scope="Ventas">Ventas</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                ?>
                    <tr>
                        <td><?=$data['id']?></td>
                        <td><?=$data['Nombre']?></td>
                        <td><?=$data['unidades']?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </article>
    </section>

    <?php
}

?>