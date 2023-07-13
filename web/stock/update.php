<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function update($id){
    
    require_once('../handlers/stock/productos.php');

    $productos = new productos();

    $datos = $productos->onlyOne($id);

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/stock/update.php" method="post">
        <?php
            foreach ($datos as $d) {
        ?>
            <input type="hidden" name="id" value="<?=$d['ID']?>" name="id">
            <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="50" id="nombre" aria-describedby="nombreLabel" name="nombre" value="<?=$d['Nombre']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="referenciaLabel">Referencia</span>
                            <input type="text" class="form-control" maxlength="50" id="referencia" aria-describedby="referenciaLabel" name="referencia" value="<?=$d['Referencia']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="categoriaLabel">Categoria</span>
                            <input type="text" class="form-control" maxlength="50" id="categoria" aria-describedby="categoriaLabel" name="categoria" value="<?=$d['Categoria']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="precioLabel">Precio</span>
                            <input type="number" class="form-control" maxlength="9" id="precio" aria-describedby="precioLabel" name="precio" value="<?=$d['Precio']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="pesoLabel">Peso</span>
                            <input type="number" class="form-control" maxlength="9" id="peso" aria-describedby="pesoLabel" name="peso" value="<?=$d['Peso']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="stockLabel">Stock</span>
                            <input type="number" class="form-control" maxlength="9" id="stock" aria-describedby="stockLabel" name="stock" value="<?=$d['Stock']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="fechaLabel">Fecha de creacion</span>
                            <input type="date" class="form-control" maxlength="9" id="fecha" aria-describedby="fechaLabel" name="fecha" value="<?=$d['FechaCreacion']?>">
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Añadir producto</button>
                </div>
            </form>
        </article>
    </section>

    <?php
}

?>