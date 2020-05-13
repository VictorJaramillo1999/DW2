<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Mis pedidos</h2>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col mb-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id_pedido</th>
                            <th scope="col">Estatus del pedido</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- lista las categorias  -->
                        <?php while($pedido = $pedidos->fetch_object()):?>
                        <tr>
                            <th scope="row"><?=$pedido->id?></th>
                            <td><strong><?=$pedido->paqueteria?></strong></td>
                            <td><?=$pedido->fecha?></td>
                            <td><a class="text-decoration-none btn btn-warning"
                                    href="<?=base_url?>Pedido/detalle&id=<?=$pedido->id?>"><i
                                        class="fas fa-trash-alt"></i> Ver pedido</a></td>

                        </tr>
                        <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>