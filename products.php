<?php

  include('conexao.php');

  if(!isset($_SESSION))
    session_start();

    if(isset($_COOKIE["usermail"])){
      $_SESSION["logado"] = TRUE;
      $_SESSION["user"] = $_COOKIE["username"];
    }
  
    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] == FALSE){
  
      header("Location:login.php");
    }else

  $qt_carrinho = 0;


  if(isset($_SESSION['carrinho'])){

    foreach($_SESSION['carrinho'] as $item)
      $qt_carrinho += $item['qt'];
  }
  
  if($qt_carrinho == 1)
    $qt_carrinho .= " item no carrinho.";

  else 
    $qt_carrinho .= " itens no carrinho.";
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <title>Loja da Ingrid : )</title>
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

<br><br><br>
<h5 style="text-align:center; font-size:30px;color:#943208;">Os produtos mais fofos :)</h5>
<br><br><br>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width:800px; margin-left:300px">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="mesinha.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="color:#943208">
        <h5>Mesa digitalizadora</h5>
        <p>Mesa digitalizadora cor de rosa, vem com caneta.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="controlerosa.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="color:#943208">
        <h5>Controle remoto gamer</h5>
        <p>Controle remoto gamer vem com orelhinhas.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="mouse.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="color:#943208">
        <h5>Mouse roda de ratinho</h5>
        <p>Mouse roda de ratinho viu bluetooth.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br><br><br><br>

<div class="container">
  <div class="row row-cols-1 row-cols-md-4 g-4" style="color:#943208; ">

  <?php 
          
    $sql_code = "SELECT * FROM produtos";
    $sql_query = $mysqli->query($sql_code) or die("Falha na Conexao de código SQL" . $mysqli->error);      
   
    while ($produtos = $sql_query->fetch_assoc()){

      $link = "adicionar.php?id=".$produtos['id'];
      $img_path = $produtos['img_path'];
  ?>

      <div class="col">
        <div class="card h-100" style="border-radius: 30px;">
          <img src="<?= $img_path ?>" class="card-img-top" alt="<?= $produtos['nome'] ?>">
            <div class="card-body" style="background-color:#fff5df;">
              <h5 class="card-title" style="font-weight:bold; color:#943208"> <?= $produtos['nome'] ?></h5>
              <p class="card-text"><?= $produtos['descricao'] ?></p>
              <p class="card-text">Estoque - <?= $produtos['qt'] ?></p>
              <h5 class="card-text text-end text-info">R$<?= number_format($produtos['preco'],2,',','') ?></h5>
              <a class="btn" style="background-color:#ff6e05; color: #ffff" href=<?php echo $link;?>  role="button">Adicionar </a>
            </div>
        </div>
      </div>
      <?php }  ?>
  </div>
</div>

<br><br>

<div class="container">

<a class="btn" style="margin-left: 480px; background-color:#ff6e05; color: #ffff" href="carrinho.php" role="button">Ir para Carrinho</a>
<br></br>
<p style="margin-left:470px;font-weight:bold; color:#943208; font-size:20px;"><?=$qt_carrinho?></p>        

</div>
<br><br><br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>