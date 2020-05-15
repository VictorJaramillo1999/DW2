<?php require_once 'controllers/categoriaController.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Gestionar Productos</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-5 d-flex justify-content-between">
            <a href="<?=base_url?>Producto/crear" class="btn btn-success mb-2">Agregar Producto</a>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Filtrar por
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="<?=base_url?>Producto/gestion">Mostrar todo</a>
                    <?php   $categoria = new Categoria();
                     $categorias = $categoria->getAll();
                     while($categoria = $categorias->fetch_object()):?>
                    <a class="dropdown-item" href="<?=base_url?>Producto/gestion&ordenar=<?=$categoria->id?>"><?=$categoria->nombre?></a>
                    <?php endwhile?>
                </div>
            </div>
        </div>
    </div>



    <!-- //Alertas -->
    <?php if(isset($_SESSION['confirmado'])):?>
    <div class="row">
        <div class="col-4">
            <div class="alert alert-success" role="alert">
                <?=$_SESSION['confirmado']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        </div>
    </div>
    <?php endif;
    Utils::alertaClose();
    ?>

    <?php if(isset($_SESSION['error'])):?>
    <div class="row">
        <div class="col-5">
            <div class="alert alert-warning" role="alert">
                <?=$_SESSION['error']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        </div>
    </div>
    <?php endif;
    Utils::alertaClose();
    ?>
    <!-- Fin alertas -->

    <div class="row">
        <div class="col-12 mb-3 ">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- lista los productos  -->
                        <?php while($producto = $productos->fetch_object()):?>
                        <tr>
                            <th><?=$producto->nombre?></th>
                            <td style="max-width:200px;"><?=$producto->desc_corta?></td>
                            <td>$ <?=$producto->precio?></td>
                            <td>Cant. <?=$producto->stock?></td>
                            <td><img style="width:150px" src="<?=base_url?>uploads/images/<?=$producto->imagen?>"
                                    alt="">
                            </td>


                            <td> <a class="text-decoration-none btn btn-primary"
                                    href="<?=base_url?>Producto/edit&id=<?=$producto->id?>"><i
                                        class="fas fa-pencil-alt"></i> Editar</a>
                                <a class="text-decoration-none btn btn-danger"
                                    href="<?=base_url?>Producto/delete&id=<?=$producto->id?>"><i
                                        class="fas fa-trash-alt"></i> Eliminar</a></td>

                        </tr>
                        <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>