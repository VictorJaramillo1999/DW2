<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="../../bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style-principal.css">
    <link rel="stylesheet" href="../../css/style-modal.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

</head>

<body>

    <!-- Layout Principal -->
    <div class="content">

        <?php
              include_once('../componentes/header.php');
              include_once('../componentes/menu.php');
              include_once('../componentes/banner.php');
              include_once('../componentes/title.php');
              include_once('../componentes/contenido.php');
            //   include_once('../componentes/gestion.php');
              include_once('../componentes/footer.php');

             //otros componentes 
              include_once('../componentes/modals.php');

        ?>
        <!-- Fin del layout -->

        <script src="../../jquery/jquery-3.4.1.min.js"></script>
        <script src="../../bootstrap/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>