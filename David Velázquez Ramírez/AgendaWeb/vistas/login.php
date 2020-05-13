<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>

<body>
    <form action="" method="POST">
        <?php
        if (isset($errorLogin)) {
            echo "<script> swal({
                title: '$title',
                text: '$errorLogin',
                type: '$typeMessages',
            });</script>";
        }
        ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
            <input type="text" name="username"></p>
        <p>Password: <br>
            <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>

</html>