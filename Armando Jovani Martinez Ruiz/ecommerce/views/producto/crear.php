<?php require_once 'models/Categoria.php';?>

<div class="container">

    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Gestionar Productos</h2>
            </div>

            <?php if($edit == true && isset($pro)): ?>
            <div>
                <h3 class="text-center">Editar Producto: <?= $pro->nombre ?></h3>
                <?php $url = base_url."Producto/save&id=".$pro->id?>
            </div>
            <?php else:?>
            <div>
                <h3 class="text-center">Agregar Producto</h3>
                <?php $url = base_url."Producto/save";?>
            </div>
            <?php endif?>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-5 ">
            <form action="<?=$url?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre"
                        value="<?=isset($pro) ? $pro->nombre : " ";?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descrición</label>
                    <textarea class="form-control" name="descripcion" id="descripcion"
                        rows="2"><?=isset($pro) ? $pro->descripcion : '';?></textarea>
                </div>
                <div class="form-group col-3">
                    <label for="precio">Precio $</label>
                    <input type="" name="precio" class="form-control " id="precio" required
                        value="<?=isset($pro) ? $pro->precio : " ";?>">
                </div>

                <div class="form-group col-3">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control " id="stock" required
                        value="<?=isset($pro) ? $pro->stock : " ";?>">
                </div>

                <!-- Carga categorias -->
                <?php $categoria = new Categoria(); 
                      $categorias = $categoria->getAll(); 
                    ?>
                <div class="form-group ">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Selecciona categoría</label>
                    <select name="categoria" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">

                        <?php  while($categoria = $categorias->fetch_object()):?>
                        <option value="<?=$categoria->id?>"
                            <?=isset($pro) && $categoria->id == $pro->categoria_id ? 'selected' : " ";?>>
                            <?=$categoria->nombre?></option>
                        <?php endwhile?>

                    </select>
                </div>

                <?php if(isset($pro)):?>
                <img class="w-50 mb-3" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="">
                <?php endif?>


                <div class="form-group">
                    <label for="imagenes">Selecciona una imagen </label>
                    <input type="file" name="imagen" class="form-control-file" id="imagenes"
                        <?=isset($pro)? '': 'required'?>>
                    <small id="imagenes" class="form-text text-muted">Tamaño ideal 500x500</small>
                </div>

                <?php if(isset($pro)): ?>
                <button type="submit" class="btn btn-success">Modificar producto</button>
                <?php else:?>
                <button type="submit" class="btn btn-success">Agregar producto</button>
                <?php endif?>
            </form>
        </div>
    </div>
</div>