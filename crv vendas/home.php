<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../funcoes/menu.php'; ?>
</head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center display-3 text-primary">Bem vindo ao sistema - CRV</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center text-white opaque-overlay gradient-overlay" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/gallery_architecture_3.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3"> <i class="d-block fa fa-3x fa-shopping-cart"></i>
          <h2 class="my-3">Realizar Venda</h2>
        </div>
        <div class="col-md-3 p-4"> <i class="d-block fa fa-3x fa-users"></i>
          <h2 class="my-3">Gerenciador de Clientes</h2>
        </div>
        <div class="col-md-3 p-4"> <i class="d-block fa fa-3x fa-bar-chart"></i>
          <h2 class="my-3">Ranking de Produtos</h2>
        </div>
        <div class="col-md-3 p-4"> <i class="d-block fa fa-3x fa-file"></i>
          <h2 class="my-3">Consultar Pedidos</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary">Informações sobre o Sistema</h1>
        </div>
      </div>
      <div class="row">
        <div class="text-right col-md-6">
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i class="d-block fa fa-columns fa-3x"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Info1</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i class="d-block fa fa-repeat fa-4x"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Info3</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i class="d-block fa  fa-comment-o fa-3x"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Info5</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
        <div class="text-left col-md-6">
          <div class="row my-5">
            <div class="col-2 text-center"><i class="d-block fa fa-battery-empty fa-3x"></i></div>
            <div class="col-10">
              <h4 class="text-primary">Info2</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 text-center"><i class="d-block mx-auto fa  fa-clone fa-3x"></i></div>
            <div class="col-10">
              <h4 class="text-primary">Info4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 text-center"><i class="d-block fa  fa-wrench fa-3x"></i></div>
            <div class="col-10">
              <h4 class="text-primary">Info6</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2019 CRV SPORTS <i class="fa d-inline fa-lg fa-empire"></i> - Todos os direitos reservados.</p>
        </div>
  </div>
</body>

</html>

<?php
    mysqli_close($conecta);
?>