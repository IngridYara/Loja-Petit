<?php

  if (!isset ($_SESSION))
    session_start();

    if(isset($_COOKIE["usermail"])){
      $_SESSION["logado"] = TRUE;
      $_SESSION["user"] = $_COOKIE["username"];

      header("Location:products.php");
    }
     
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>
  </head>
             
  <body style="background-color:#f2dbbb" class="text-center">

  
  <nav class="navbar navbar-expand-lg " style="background-color:#943208" >
      <div class="container-fluid" >
        <div class="row g">
          <div class="col p-0">
            <img src="paozinho.png" class="card-img-top" alt="..." style="width:85px; margin-left: 210px;">
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
  
      <div class="row justify-content-center mt-5">
        <div class="jumbotron col-md-3 border mt-5" style="background-color:#fefde1">
          <div class="container ">
              <img class="mb-4" src="login.svg" alt="" width="72" height="72">

              <form action = "validaLogin.php" method = "POST">
                <input type="email" name="inputEmail" class="form-control" placeholder="Endereço de e-mail" required autofocus>
                <input type="password" name="inputSenha" class="form-control mt-2" placeholder="Senha" required>
                       
                <div class="form-group form-check mt-3" style="box-shadow: #ff6e05;">
                  <input  type="checkbox" class="form-check-input" name = "checkConectado" id="checkConectado">
                  <label class="form-check-label" for="checkConectado">Permanecer conectado</label>
                </div>

                <button style="background-color:#ff6e05; color: #ffff" class="btn btn-lg  btn-block" type="submit">Entrar</button>
              </form>

              <?php

                if(isset($_SESSION["msg_login"])){

                  echo '<div class="text-center text-danger mt=3">';
                  echo $_SESSION["msg_login"];
                  echo '</div>';

                  unset($_SESSION["msg_login"]);
                }

              ?>
          </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>