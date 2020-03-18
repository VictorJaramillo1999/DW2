  <!-- Inicio del menú -->

  <div class="row sticky-top" id="menu">
      <div class="col-xl-12 ">
          <nav class=" nav navbar navbar-expand-lg navbar-dark bg-dark ">
              <a class="navbar-brand" href="#">Tienda Online</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="#">Hombre</a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="#">Mujer</a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="#">Niño</a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="#">Niña</a>
                      </li>



                      <li class="nav-item">
                          <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                  aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                          </form>
                      </li>
                  </ul>

                  <ul class="navbar-nav ">
                      <li class=" nav-item dropdown">
                          <a class="user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Usuario
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                              <?php
                                    $sesion=1;
                                    if($sesion==1) {
                                        echo '<a class="dropdown-item" href="#">Cuenta</a>
                                        <a class="dropdown-item" href="#">Configuración</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#login" href="#">Iniciar Sesión</a>';    
                                    }else{
                                        echo '<a class="dropdown-item" href="#">Editar categorias</a>
                                        <a class="dropdown-item" href="#">Editar productos</a>
                                        <a class="dropdown-item" href="#">Editar pedidos</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Cerrar Sesión</a>';
                                    }
                                    ?>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>
      </div>

  </div>
  <!-- Fin menú -->