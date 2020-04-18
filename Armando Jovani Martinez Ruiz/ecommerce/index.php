<!-- Layout Principal -->
<div class="content">

    <?php
    include_once('views/layout/header.php');
    include_once('views/layout/menu.php');
    include_once('views/layout/banner.php');
    //autocarga los controladores necesarios
    require_once 'autoload.php';


    //  Main - Controlador frontal 
    
        if (isset($_GET['controller']) && class_exists($_GET['controller'])) {

            $nombreController = $_GET['controller'];
            $controller = new $nombreController();

                if (isset($_GET['action']) && method_exists($controller,$_GET['action'])) {
                    $action = $_GET['action'];

                    $controller->$action();
                }else{
                   echo 'La pagina no existe';
                }
        }else{
            echo 'No existe';
        }

     /*Fin Main - Controlador frontal*/


    // include_once('views/layout/contenido.php');
    include_once('views/layout/footer.php');
    // Otros componentes
    include_once('views/layout/modals.php');

    ?>

</div>
<!-- Fin layout -->