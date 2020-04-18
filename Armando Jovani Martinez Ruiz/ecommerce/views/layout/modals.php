   <!-- Modales de formularios -->
   <div id="userLogin">
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Iniciar Sesión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="imputEmail4"
                                            placeholder="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-12 col-md-5">
                                <a class="registrar" class="close" data-dismiss="modal" data-toggle="modal"
                                    data-target="#register"> Registrar Cuenta</a>
                            </div>
                            <div class="col-sm-12 col-md-6 boton">
                                <button type="button" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin Modal_iniciarSesión -->

        <!-- Modal_registrarse -->
        <div id="userRegister">
            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nombre(s)">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="imputEmail4"
                                            placeholder="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrarme</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal_registarse -->
        <!-- Fin de modales de formularios -->