<?php require_once 'models/categoria.php'?>

<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Gestionar Categorías</h2>
            </div>

            <div>
                <h3 class="text-center">Modificar Categoría</h3>
            </div>
        </div>
    </div>

    <?php
          $id = (int)$_GET['id'];
          $categorias = new Categoria();
         
           $categoria = $categorias->getCategoria($id);
    ?>

    <div class="row">
        <div class="col mb-5">
            <form class="form-inline" action="<?=base_url?>categoria/update&id=<?=$categoria->id?>" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="categoria" class="form-control" value="<?=$categoria->nombre?>" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Modificar categoría</button>
            </form>
        </div>
    </div>