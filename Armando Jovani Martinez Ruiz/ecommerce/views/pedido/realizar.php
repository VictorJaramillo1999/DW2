<div class="container">

    <div class="row">
        <div class="col-12 mb-3">
            <div class="title">
                <h2>Datos del pedido</h2>
            </div>
        </div>
    </div>

    <form action="<?=base_url?>Pedido/add" method="POST">
        <legend class="mb-5">Domicilio</legend>
        <div class="row justify-content-around mb-3">
            <div class="col-5">
                <label for="provincia">Estado</label>
                <input name="estado" type="text" class="form-control" pattern="^[a-zA-Z\s]+{2,254}" required>
            </div>
            <div class="col-5">
                <label for="localidad">Municipio</label>
                <input name="localidad" type="text" class="form-control" pattern="^[a-zA-Z\s]+{2,254}" required>
            </div>
        </div>

        <div class="row justify-content-around mb-4">
            <div class="col-5">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>
            <div class="col-5">
                <label for="codigo">Código Postal</label>
                <input type="text" name="codigo" class="form-control" pattern="^[0-9]+" required>
            </div>
        </div>

        <div class="row justify-content-around mb-5">
            <div class="col-2">
                <label for="">Precio del envío</label>
                <input type="text" name="envio" value="100" class="form-control" readonly>
            </div>
        </div>



        <div class="row mt-4 mb-4 justify-content-around">
            <div class="col-4">
                <button type="submit" class="btn btn-success btn-lg btn-block">Confirmar Compra</button>
            </div>
        </div>

    </form>

    <div class="row justify-content-around">
    </div>
</div>