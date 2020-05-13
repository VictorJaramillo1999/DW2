<!-- Modales de inicio de sesión -->
<div id="userLogin">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="<?=base_url?>Usuario/login" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Iniciar Sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="imputEmail4"
                                    placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-12 col-md-5">
                            <a class="registrar" class="close" data-dismiss="modal" data-toggle="modal"
                                data-target="#register"> Registrar Cuenta</a>
                        </div>
                        <div class="col-sm-12 col-md-6 boton">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Fin Modal_iniciarSesión -->