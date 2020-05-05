<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Mi carrito</h2>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION['carrito'])):?>
    <div class="row mb-4">
        <a class="text-decoration-none btn btn-danger" href="<?=base_url?>Carrito/deleteAll">Vaciar carrito</a>
    </div>

    <div class="row">
        <div class="col-12 mb-3 ">
            <table class="table align-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- lista los productos del carrito  -->
                    <?php 
                  
                    foreach($_SESSION['carrito'] as $indice => $elemento):
                        $producto = $elemento['producto'];
                        ?>
                    <tr>
                        <th><?=$producto->nombre?></th>
                        <td style="max-width:200px;"><?=$producto->desc_corta?></td>
                        <td>$ <?=$producto->precio?></td>
                        <td>Cant. <?=$elemento['unidades']?></td>
                        <td><img style="width:150px" src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="">
                        </td>
                        <td>$ <?=$producto->precio * $elemento['unidades']?></td>

                        <td>
                            <a class="text-decoration-none btn btn-danger"
                                href="<?=base_url?>Carrito/remove&id=<?=$producto->id?>">-</a>
                            <a class="text-decoration-none btn btn-success"
                                href="<?=base_url?>Carrito/add&id=<?=$producto->id?>">+</a>
                        </td>

                    </tr>
                    <?php 
                    endforeach;
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row mt-4 mb-4 justify-content-around">
        <div class="col-6">
            <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="btn btn-success btn-lg btn-block">Comprar</a>
        </div>
    </div>
    <?php else:?>

    <p class="text-center mb-5 mt-5 " style="font-size:50px">Carrito vacío</p>
    <?php endif?>
</div>