<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Todos los pedidos</h2>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col mb-5 d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Filtrar por
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="<?=base_url?>Pedido/ver">Mostrar todo</a>
                    <a class="dropdown-item" href="<?=base_url?>Pedido/ver&filtrar=Pendiente">Pendiente</a>
                    <a class="dropdown-item" href="<?=base_url?>Pedido/ver&filtrar=En preparacion">En preparación</a>
                    <a class="dropdown-item" href="<?=base_url?>Pedido/ver&filtrar=Empacado">Empacado</a>
                    <a class="dropdown-item" href="<?=base_url?>Pedido/ver&filtrar=Enviado">Enviado</a>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if(isset($_SESSION['confirmado'])):?>

        <div class="alert alert-success" role="alert">
            <?=$_SESSION['confirmado']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>

        <?php 
endif;
Utils::alertaClose();
if(isset($_SESSION['error'])):?>

        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['error']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        <?php endif;
   Utils::alertaClose();
?>
    </div>


    <div class="row ">
        <div class="col mb-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id_pedido</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estatus del pedido</th>
                            <th scope="col">Estatus del pago</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- lista las categorias  -->
                        <?php while($pedido = $pedidos->fetch_object()):?>
                        <tr>
                            <th scope="row"><?=$pedido->id?></th>

                            <?php $id = $pedido->id;
                            $pedido1 =  new Pedido();
                            $pedido_total = $pedido1->getPrecioPedido($id);
                            ?>
                            <td>$ <?=$pedido_total?></td>
                            <td><?=$pedido->fecha?></td>
                            <td><strong><?=$pedido->paqueteria?></strong></td>
                            <td><?=$pedido->pago?></td>

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