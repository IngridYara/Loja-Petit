<?php

    if (!isset ($_SESSION))
    session_start();

    unset($_SESSION["user"]);
    unset($_SESSION["logado"]);
    unset($_SESSION["msg_login"]);

    //limpa tudo
    // session_unset();
    
    session_destroy();

    setcookie("usermail","", time()-1);
    setcookie("username","", time()-1);

    header("Location:login.php");

?>