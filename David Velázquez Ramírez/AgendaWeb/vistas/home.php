<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c42e92f9a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>

<body>
    <?php
    if (isset($errorLogin)) {
        echo "<script> swal({
                title: '$title',
                text: '$errorLogin',
                type: '$typeMessages',
            });</script>";
    }
    ?>
    <div class="contenedor active" id="contenedor">
        <header class="header">
            <div class="contenedor-log">
                <button id="boton-menu" class="boton-menu"><i class="fas fa-ellipsis-h"></i></button>
                <a href="#" class="logo"><i class="fas fa-calendar-day"></i><span>Agenda WEB</span></a>
            </div>

            <!--<div class="barra-busqueda">
                <input type="text" placeholder="Buscar">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>-->

            <div class="botones-header">
                <button id="" class=""><i class="fas fa-cog"></i></button>
                <a href="includes/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i></a>
                <a href="#" class="avatar"><img src="img/user.jpg" alt="" class="src"></a>

            </div>
        </header>

        <nav class="menu_lateral">
            <a href="#" class="active"><i class="fas fa-book-open"></i> Materias</a>
            <a href="#"><i class="fas fa-chalkboard-teacher"></i> Maestros</a>
            <a href="#"><i class="fas fa-clock"></i> Horarios</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Calendario</a>
            <a href="#"><i class="fas fa-sticky-note"></i> Notas</a>

        </nav>

        <main class="main">
            <h3 class="titulo">Welcome to AGENDA</h3>
            <div class="grid-options">
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
                <a href="#" class="options"><img src="https://via.placeholder.com/520x281?text=Test" alt=""></a>
            </div>
        </main>
    </div>


    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>