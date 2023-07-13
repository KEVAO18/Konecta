<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function productos(){
    
    require_once('../handlers/stock/productos.php');

    $productos = new productos();

    $datos = $productos->allColums();
    
    $i=0;

    ?>

    <section>
        <article>
            <div class="d-grid gap-4 py-4" id="add">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar" class="btn btn-outline-dark">Añadir Producto</a>
            </div>
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
                        <th scope="accion">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1; 
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
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/stock/delete.php?id=<?=$data['ID']?>" class="btn btn-danger">Eliminar</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>update/<?=$data['ID']?>" class="btn btn-warning">actualizar</a>
                        </td>
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