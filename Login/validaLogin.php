<?php

    include('./../conexao.php');

    if (!isset ($_SESSION))
        session_start();

    $email_entrada = isset ($_POST["inputEmail"]) ? $_POST["inputEmail"] : "";
    $senha_entrada = isset ($_POST["inputSenha"]) ? $_POST["inputSenha"] : "";

    $sql_code = "SELECT nome FROM users WHERE email = '$email_entrada' AND senha = '$senha_entrada'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na Conexao de código SQL" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();
        $nome_cadastrado = $usuario['nome'];

        echo $nome_cadastrado;
        $_SESSION["user"] = $nome_cadastrado;
        $_SESSION["logado"] = TRUE;
 
        if (isset($_POST["checkConectado"])){
    
            setcookie("usermail", $email_entrada, time() + 3600);
            setcookie("username", $nome_cadastrado, time() + 3600);
        }
        header("Location:./../products.php");
 

    }else{

        $_SESSION["msg_login"] = "E-mail ou senha incorretos";
        header("Location:login.php");

    }

?>