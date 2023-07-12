<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function insertar(){
    
    @require_once('../handlers/stock/productos.php');

    $productos = new productos();

    $datos = $productos->allColums();

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/stock/insertar.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="50" id="nombre" aria-describedby="nombreLabel" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="referenciaLabel">Referencia</span>
                            <input type="text" class="form-control" maxlength="50" id="referencia" aria-describedby="referenciaLabel" name="referencia">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="categoriaLabel">Categoria</span>
                            <input type="text" class="form-control" maxlength="50" id="categoria" aria-describedby="categoriaLabel" name="categoria">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="precioLabel">Precio</span>
                            <input type="number" class="form-control" maxlength="9" id="precio" aria-describedby="precioLabel" name="precio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="pesoLabel">Peso</span>
                            <input type="number" class="form-control" maxlength="9" id="peso" aria-describedby="pesoLabel" name="peso">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="stockLabel">Stock</span>
                            <input type="number" class="form-control" maxlength="9" id="stock" aria-describedby="stockLabel" name="stock">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="fechaLabel">Fecha de creacion</span>
                            <input type="date" class="form-control" maxlength="9" id="fecha" aria-describedby="fechaLabel" name="fecha">
                        </div>
                    </div>

                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Añadir producto</button>
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
                        <th scope="Referencia">Referencia</th>
                        <th scope="Precio">Precio</th>
                        <th scope="Peso">Peso</th>
                        <th scope="Categoria">Categoria</th>
                        <th scope="Stock">Stock</th>
                        <th scope="fecha">Fecha de creacion</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                ?>
                    <tr>
                        <td><?=$data['ID']?></td>
                        <td><?=$data['Nombre']?></td>
                        <td><?=$data['Referencia']?></td>
                        <td><?=$data['Precio']?></td>
                        <td><?=$data['Peso']?></td>
                        <td><?=$data['Categoria']?></td>
                        <td><?=$data['Stock']?></td>
                        <td><?=$data['FechaCreacion']?></td>
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