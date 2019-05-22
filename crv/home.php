<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../funcoes/menu.php'; ?>
  <link rel="stylesheet" href="lib\fontawesome-free-5.8.1-web\css\all.css">
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
        <div class="p-4 col-md-3"> <i style="cursor: pointer;" onclick='realizarVenda()' class="d-block fa fa-3x fa-shopping-cart"></i>
          <h2 style="cursor: pointer;" onclick='realizarVenda()' class="my-3">Realizar Venda</h2>
        </div>
        <div class="col-md-3 p-4"> <i style="cursor: pointer;" onclick='clientes()' class="d-block fa fa-3x fa-users"></i>
          <h2 style="cursor: pointer;" onclick='clientes()' class="my-3">Gerenciador de Clientes</h2>
        </div>
        <div class="col-md-3 p-4"> <i style="cursor: pointer;" onclick='rankingProdutos()' class="d-block fa fa-3x fa-bar-chart"></i>
          <h2  style="cursor: pointer;" onclick='rankingProdutos()' class="my-3">Ranking de Produtos</h2>
        </div>
        <div class="col-md-3 p-4"> <i style="cursor: pointer;" onclick='pedidos()' class="d-block fa fa-3x fa-file"></i>
          <h2 style="cursor: pointer;" onclick='pedidos()' class="my-3">Consultar Pedidos</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary">Atalhos do Sistema</h1>
        </div>
      </div>
      <div class="row">
        <div class="text-right col-md-6">
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i style="cursor: pointer;" onclick='realizarVenda()' class="d-block fa fa-3x fa-columns fa-shopping-cart"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 style="cursor: pointer;" onclick='realizarVenda()' class="text-primary">Vendas</h4>
              <p>Realize as vendas aqui.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i style="cursor: pointer;" onclick='clientes()' class="d-block fa fa-repeat fa-3x fa-users"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 style="cursor: pointer;" onclick='clientes()' class="text-primary">Clientes</h4>
              <p>Cadastro, busca e alteração de clientes.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i style="cursor: pointer;" onclick='orcamento()' class="d-block fa fa-3x fa-money "></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 style="cursor: pointer;" onclick='orcamento()' class="text-primary">Orçamento</h4>
              <p>Criar e salvar orçamentos.</p>
            </div>
          </div>
        </div>
        <div class="text-left col-md-6">
          <div class="row my-5">
            <div class="col-2 text-center"><i style="cursor: pointer;" onclick='rankingProdutos()' class="d-block fa fa-3x fa-bar-chart"></i></div>
            <div class="col-10">
              <h4 style="cursor: pointer;" onclick='rankingProdutos()' class="text-primary">Produtos</h4>
              <p>Busque, cadastre, vizualize e altere produtos.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 text-center"><i style="cursor: pointer;" onclick='pedidos()' class="d-block mx-auto fa  fa-clone fa-3x fa-file"></i></div>
            <div class="col-10">
              <h4 style="cursor: pointer;" onclick='pedidos()' class="text-primary">Pedidos</h4>
              <p>Veja os pedidos e orçamentos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
</body>

</html>
<script>
function realizarVenda() {
    window.location.href = "vendas.php";
  }
function clientes() {
    window.location.href = "clientes.php";
  }
function rankingProdutos() {
    window.location.href = "produtos.php";
  }
function pedidos() {
    window.location.href = "pedidos.php";
  }
function orcamento() {
    window.location.href = "orcamentos.php";
  }


</script>
<?php
    mysqli_close($conecta);
?>