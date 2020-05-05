
<?php require_once 'controllers/categoriaController.php'; ?>
<!-- Inicio del menú -->

<div class="row sticky-top" id="menu">
    <div class="col-xl-12 ">
        <nav class=" nav navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="index.php">Tienda Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url?>">Inicio <span class="sr-only">(current)</span></a>
                    </li>

                    <?php 
                     $categoria = new Categoria();
                     $categorias = $categoria->getAll();

                    while($categoria = $categorias->fetch_object()):?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?=base_url?>categoria/ver&id=<?=$categoria->id?>"><?=$categoria->nombre?></a>
                    </li>
                    <?php endwhile?>

                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav ">
                    <li class=" nav-item dropdown">
                        <!-- Nombre del usuario que inicio sesión -->
                        <?php if(isset($_SESSION['usuario'])):?>

                        <a class="user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$_SESSION['usuario']->nombre?></a>

                        <?php else:?>

                        <a class="user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario</a>

                        <?php endif?>

                        <!-- Menu segun los tipos de usuario -->

                        <?php if(!isset($_SESSION['usuario'])):?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" data-toggle="modal" data-target="#login" href="#">Iniciar
                                Sesión</a>
                        </div>

                        <?php 
                        endif;

                        if(isset($_SESSION['usuario']) && !isset($_SESSION['admin'])):?>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cuenta</a>
                            <a class="dropdown-item" href="#">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                        </div>

                        <?php
                           endif;

                           if(isset($_SESSION['usuario']) && isset($_SESSION['admin'])):
                        ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url?>categoria/index">Gestionar categorías</a>
                            <a class="dropdown-item" href="<?=base_url?>Producto/gestion">Gestionar productos</a>
                            <a class="dropdown-item" href="#">Editar pedidos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                        </div>
                        <?php endif?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- Fin menú -->