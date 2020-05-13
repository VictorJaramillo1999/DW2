
<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user'])) {
    //echo "hay sesion";
    
    $user->setUser($userSession->getCurrentUser());
    $title = "Bienvenido";
    $errorLogin = "Sesion activa para: " . $user ->getNombre();
    $typeMessages = 'success';
    include_once 'vistas/home.php';
} else if (isset($_POST['username']) && isset($_POST['password'])) {

    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if ($user->userExists($userForm, $passForm)) {
        //echo "Existe el usuario";

        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        $title = "Bienvenido";
        $errorLogin = "Iniciaste sesión como: " . $user->getNombre();
        $typeMessages = 'success';
        include_once 'vistas/home.php';
    } else {
        //echo "No existe el usuario";
        $title = "¡Error!";
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        $typeMessages = 'error';
        include_once 'vistas/login.php';
    }
} else {
    //echo "login";
    $title = "Adios...";
    $errorLogin = "Se ha cerrado sesión :(";
    $typeMessages = 'info';
    include_once 'vistas/login.php';
}
?>
