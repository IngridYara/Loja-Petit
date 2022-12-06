<?php

    include_once "dados.php";
    include('conexao.php');
    
    if(!isset($_SESSION))
        session_start();

   
    if(isset($_SESSION['carrinho'])){

        $sql_code = "SELECT * FROM produtos";
        $sql_query = $mysqli->query($sql_code) or die("Falha na Conexao de código SQL" . $mysqli->error);

        $total = $sql_query->num_rows;

        $qt_itens_qt_ok = 0;

        while ($usuario = $sql_query->fetch_assoc()){

            $teste[]= $usuario;
        }

        foreach($_SESSION['carrinho'] as $item){

            $i = 0;

            while($i < $total && $teste[$i]['id'] != $item['id'])
                $i++;

            if($i < $total){
                      
                if($item['qt'] <= $teste[$i]['qt']){

                    $teste[$i]['qt'] -= $item['qt'];
                    $qt_itens_qt_ok++;
                } 
                
                if($qt_itens_qt_ok == count($_SESSION['carrinho'])){

                    $_SESSION['todos_produtos'] =  $teste;
                    unset($_SESSION['carrinho']);
                    $_SESSION['compra_efetuada'] = true;
                }
            }
        }
    }
    header("Location:mensagem.php");
?>