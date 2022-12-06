<?php
    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['carrinho'])){

        if(isset($_GET['id'])){

            $id = $_GET['id'];
            
            foreach($_SESSION['carrinho'] as $i => $item){
                
                if($item['id'] == $id){
                    unset($_SESSION['carrinho'][$i]);
                }    
            }
        }
    }
    
    header("Location:carrinho.php");
?>
