<!-- Layout Principal -->
<div class="content">

    <?php
    ob_start();
    require_once 'config/parameters.php';
    require_once 'config/DB.php';
    require_once 'autoload.php';

    session_start();
    
    include_once('views/layout/header.php');
    include_once('views/layout/menu.php');
    include_once('views/layout/banner.php');
    //autocarga los controladores necesarios
    

  


    //  Main - Controlador frontal 

    if(!isset($_GET['controller']) && !isset($_GET['action'])){
       
        $controller = new ProductoController();
        $controller-> index();
            
    }else{
           $nombreController = $_GET['controller']."Controller";
        
           if (isset($_GET['controller']) && class_exists($nombreController)) {

               $controller = new $nombreController();
            
                   if (isset($_GET['action']) && method_exists($controller,$_GET['action'])) {
                       $action = $_GET['action'];

                       $controller->$action();
                   }else{
                      $error = new ErrorController();
                      $error->index();
                }
            }else{
                $error = new ErrorController();
                $error->index();


            }
        }

     /*Fin Main - Controlador frontal*/


    // include_once('views/layout/contenido.php');
    include_once('views/layout/footer.php');
    // Otros componentes
    include_once('views/Usuarios/login.php');
    include_once('views/usuarios/registro.php');

    ?>

</div>
<!-- Fin layout -->