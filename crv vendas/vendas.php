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
          <h1 class="text-center display-3 text-primary">Painel de Vendas</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a class="btn btn-primary " href="#"><i class="fa d-inline fa-lg fa-barcode"></i></a>
        <input type="text" class="form-control" id="" placeholder="Código de barras"> </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3"> <label class="control-label col-sm-12" for="email">Quantidade:</label>
        <input type="text" class="form-control" id="email" placeholder="Qtd."> </div>
      <div class="col-md-3"> <label class="control-label col-sm-12" for="email">Preço:</label>
        <input type="text" class="form-control" id="email" placeholder="Preco"> </div>
      <div class="col-md-3"> <label class="control-label col-sm-12" for="email">Total:</label>
        <input type="text" class="form-control" id="email" placeholder="Total"> </div>
      <div class="col-md-3">
        <a class="btn btn-primary " href="#"><i class="fa d-inline fa-lg fa-check"></i>Confirmar</a>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Qtd</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bandagem Elástica</td>
                <td>R$41,31</td>
                <td>1</td>
                <td>R$41,31</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Suporte de coluna</td>
                <td>R$54,81</td>
                <td>1</td>
                <td>R$54,81</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Halter Straps</td>
                <td>R$41,31</td>
                <td>2</td>
                <td>R$82,62</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Faixa Elástica - Cotovelo</td>
                <td>R$25,80</td>
                <td>1</td>
                <td>R$25,80</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Luva Esportiva</td>
                <td>R$28,90</td>
                <td>1</td>
                <td>R$28,90</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <h1 class="display-1">R$233,44</h1>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
</body>

</html>

<?php
    mysqli_close($conecta);
?>