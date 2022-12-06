<?php

  //inicia a sessão
  if (!isset($_SESSION))
    session_start();

    if(isset($_COOKIE["usermail"])){
      $_SESSION["logado"] = TRUE;
      $_SESSION["user"] = $_COOKIE["username"];
    }
  
    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] == FALSE){
  
      header("Location:login.php");
    }else

  //recupera o carrinho que está na sessão ou cria um novo array
  $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : NULL;
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Carrinho</title>

  </head>

  <body style="background-color:#f2dbbb">
  <nav class="navbar navbar-expand-lg " style="background-color:#943208" >
      <div class="container-fluid" >
        <div class="row g">
          <div class="col p-0">
            <img src="paozinho.png" class="card-img-top" alt="..." style="width:85px; margin-left: 710px;">
          </div>

          <div class="collapse navbar-collapse col p-0" id="navbarText"  >

          <span class="navbar-text"  >
              <h1 style="font-size:60px; margin-left: 440px; color: #fff5df">Petit Desktop</h1>
            </span>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style=" margin-left: 200px; ">
              <li class="nav-item" >
                <h5 > <a style=" color: #fffaee" class="nav-link" href="products.php">Produtos</a></h5>
              </li>
              
              <li class="nav-item" >
                <h5 > <a style=" color: #fff5df" class="nav-link" href="carrinho.php">Carrinho</a></h5>
              </li>

              <li class="nav-item" >
                <h5><a style=" color: #fff5df" class="nav-link" href="logout.php">Sair</a></h5>
              </li>
            </ul>
          </div>
    
      </div>
    </nav>


    <div class="jumbotron bg-transparent">
      <div class="container">

        <p style="font-size:40px; color: #943208; " class="card-text text-left">Carrinho de compras</p>

      </div>
    </div>

    <?php

      if ($carrinho == NULL) {
    ?>

        <div class="container">
          <div class="alert alert-warning text-center" role="alert">

            <h3> Seu carrinho está vazio!!!</h3>
            <hr>
            <a href="produtos.php" class="alert-link"> Ir para Lista de Produtos</a>

          </div>
        </div>
    <?php } else {?>

    <div class="container">
    <div class="card h-100">
      <table class="table table-hover rounded-top" style="color:#943208; ">
        <thead style="background-color:#fff5df;" >

          <tr>
            <th style="color:#943208;" scope="col">Código</th>
            <th style="color:#943208;" scope="col">Descrição</th>
            <th style="color:#943208;" scope="col">Quantidade</th>
            <th style="color:#943208;" scope="col">Total</th>
            <th style="color:#943208;" scope="col"></th>
          </tr>

        </thead>

        <tbody style="background-color:#fefde1;">
          <?php

            $total_compra = 0;  //armazena o total da compra

            foreach ($carrinho as $item) {

              $total = $item['qt'] * $item['preco'];
              $total_compra += $total;
              $link = "excluir.php?id=" . $item['id'];
          ?>
              <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['descricao']; ?></td>
                <td><?php echo $item['qt']; ?></td>
                <td><?php echo "R$ " . number_format($total, 2, ",", ""); ?></td>
                <td> <a class="btn " style="border-radius:8px;color: #ab6f3e; border-color:#ab6f3e; background-color:#fff0d4" href=<?php echo $link; ?> role="button">Excluir do Carrinho</a></td>
              </tr>
            <?php } //fim foreach ?>
        </tbody>
      </table>
    </div>
    </div>
    <div class="container">

    <br><br>
      <p  style="color:#943208; font-size:30px;" > Total da Compra: R$ <?= number_format($total_compra, 2, ",", "") ?></p>

    </div>

    <div class="container">

      <a class="btn btn-primary" href="products.php" role="button" style="padding:10px 15px; color: #83521d; border-color:#ab6f3e; background-color:#eac49a">Ir para Lista de Produtos</a>
      <a style="background-color:#ff6e05; color: #ffff; padding:10px 15px" class="btn " href="finalizar.php" role="button">Finalizar Compra</a>

    </div>

    <?php
    
      }
    
    ?>
<br><br>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>