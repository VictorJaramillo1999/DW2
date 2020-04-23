 <!-- Modal_registrarse -->
 <div id="userRegister">
     <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <form action="<?=base_url?>Usuario/registro" method="POST">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title " id="exampleModalLabel">Registro</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="form-group row">
                             <div class="col">
                                 <input type="text" name="nombre" required="required" class="form-control" placeholder="Nombre(s)">
                             </div>
                             <div class="col">
                                 <input type="text" name="apellidos" required="required" class="form-control" placeholder="Apellidos">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="staticEmail"  class="col-sm-2 col-form-label">Email</label>
                             <div class="col-sm-10">
                                 <input type="email" name="email" class="form-control" id="imputEmail4"
                                     placeholder="email@example.com" required="requiered">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                             <div class="col-sm-10">
                                 <input type="password" name="password" class="form-control" id="inputPassword" required="required">
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-primary">Registrarme</button>
                     </div>

        
                 </div>
             </div>
         </form>
     </div>
 </div>
 <!-- Fin Modal_registarse -->