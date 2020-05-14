<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Pedido</h2>
            </div>
        </div>
    </div>


    <form action="<?=base_url?>Pedido/estatus" method="POST">

        <div class="row justify-content-center mb-3">

            <div class="col-3">
                <div class="form-group">
                    <?php $pedido = $_GET['id'];?>
                    <input type="hidden" name="pedido" value="<?=$id?>">

                    <label for="exampleFormControlSelect1"><strong>Cambiar estatus del pedido</strong></label>
                    <select name="estatus" class="form-control" id="exampleFormControlSelect1">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En preparación">En preparación</option>
                        <option value="Empacado">Empacado</option>
                        <option value="Enviado">Enviado</option>
                    </select>
                </div>
            </div>
            <div class="col-2 mt-4">
                <button type="submit" class="btn btn-primary">Cambiar</button>
            </div>

        </div>
    </form>
    <div class="row justify-content-around">
        <div class="col-8">
            <?php while($producto = $productos->fetch_object()):?>
            <div class="card mb-5">
                <div class="card-header">
                    <h2> <?=$producto->nombre?></h2>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><?=$producto->desc_corta?></h5>
                            <p class="card-text text-justify"><?=$producto->descripcion?></p>
                            <h5 class="card-text">Unidades: <?=$producto->unidades?></h5>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="w-100 img-fluid" src="<?=base_url?>uploads/images/<?=$producto->imagen?>"
                            alt="producto">
                    </div>
                    <div class="col">
                        <div class="card-header">
                            <h5>Dirección de envio</h5>
                            <p class="card-text text-justify"><?=$producto->estado?>, <?=$producto->localidad?>.</p>
                            <p class="card-text text-justify"><?=$producto->direccion?>, <?=$producto->c_postal?></p>
                        </div>
                    </div>

                </div>
            </div>
            <?php endwhile?>
        </div>

    </div>

</div>