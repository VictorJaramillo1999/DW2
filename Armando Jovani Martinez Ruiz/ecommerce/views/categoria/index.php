<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Gestionar Categorías</h2>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col mb-5">
            <form class="form-inline" action="<?=base_url?>categoria/save" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="categoria" class="form-control" placeholder="Nombre" required>
                </div>
                <button type="submit" class="btn btn-success mb-2">Agregar categoría</button>
            </form>
        </div>
    </div>
   
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

    <div class="row">
        <div class="col mb-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- lista las categorias  -->
                        <?php while($categoria = $categorias->fetch_object()):?>
                        <tr>
                            <th scope="row"><?=$categoria->id?></th>
                            <td><?=$categoria->nombre?></td>
                            <td><a class="text-decoration-none btn btn-primary"
                                    href="<?=base_url?>categoria/viewUpdate&id=<?=$categoria->id?>"><i
                                        class="fas fa-pencil-alt"></i> Editar</a></td>
                            <td><a class="text-decoration-none btn btn-danger"
                                    href="<?=base_url?>categoria/delete&id=<?=$categoria->id?>"><i
                                        class="fas fa-trash-alt"></i> Eliminar</a></td>

                        </tr>
                        <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>