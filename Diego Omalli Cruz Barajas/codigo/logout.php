<?php

    include_once 'user.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location:loginmedicos.php");

?>