<?php

include('conexao.php');
    //inclui o arquivo "dados.php"
    include_once "dados.php";

    //verifica se não há uma sessão iniciada, se não houver, inicia uma nova sessão
    if(!isset($_SESSION))
        session_start();
   
    //recupera o carrinho que está na sessão ou cria um novo array
    $carrinho = isset($_SESSION['carrinho'])? $_SESSION['carrinho']: array();

    //recebe o id do produto que será adicionado
    //parâmetro foi passado pela URL, portanto usamos o método GET para recuperar
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        //verifica se o produto já está no carrinho
        $exist_item = false;

        foreach ($carrinho as $i => $item){
            if($item['id'] == $id){
                
                $exist_item = true;
                
                //se o produto já existir no carrinho, a quantidade será incrementada
                $carrinho[$i]['qt']++;
            }
        }

        //se o produto não existe no carrinho, será adicionado com quantidade igual à 1
        if(!$exist_item){

            $sql_code = "SELECT * FROM produtos";
            $sql_query = $mysqli->query($sql_code) or die("Falha na Conexao de código SQL" . $mysqli->error);

            $total = $sql_query->num_rows;

            while ($usuario = $sql_query->fetch_assoc()){

                $teste[]= $usuario;
            }
           
           

            //conta a número de produtos cadastrados
            $qt_produtos = count($teste);

            //pesquisa o id no array $todos_produtos
            $i = 0;

            while($i < $total && $teste[$i]['id'] != $id)
                $i++;  
            
            echo $i;
            echo $qt_produtos;

            //encontrou o produto
            if($i <= $qt_produtos){ 
            
                //recupera os dados do produto
                $produto = $teste[$i];
                //atualiza a quantidade de produtos no carrinho para 1
                $produto['qt'] = 1;
                //adiciona o produto ao final do array $carrinho
                $carrinho[] = $produto;
                //array_push($carrinho, $produto); //adiciona um elemento ao final do array

            } //fim if ($i < $qt_produtos)
    
        }//fim if(!$exist_item)

        //atualizar a variável carrinho na sessão
        $_SESSION['carrinho'] = $carrinho;

    }// fim if(isset($_GET['id']))

    // visualizar os dados do carrinho
    echo "<pre>";
    print_r($carrinho);
    echo "</pre>";
   
    header("Location:products.php");
?>
