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
                    <input type="text" name ="categoria" class="form-control" placeholder="Nombre" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Agregar categoría</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- lista las categorias  -->
                    <?php while($categoria = $categorias->fetch_object()):?>
                    <tr>
                        <th scope="row"><?=$categoria->id?></th>
                        <td><?=$categoria->nombre?></td>
                        <td><a class="text-decoration-none" href="<?=base_url?>categoria/viewUpdate&id=<?=$categoria->id?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
                        <td><a class="text-decoration-none" href="<?=base_url?>categoria/delete&id=<?=$categoria->id?>"><i class="fas fa-trash-alt"></i> Eliminar</a></td>

                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>
        </div>
    </div>
</div>