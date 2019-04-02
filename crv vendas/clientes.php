<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once("../funcoes/cadastrarcliente.php"); ?>
    <?php include '../funcoes/menu.php'; ?>
		
</head>

  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary">Gerenciador de Clientes</h1>
        </div>
      </div>
      <div class="row">
        <div class="text-right col-md-6">
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center"><i class="d-block fa fa-columns fa-3x"></i></div>
            <div class="col-10 text-lg-right text-left order-lg-1">
                <h4 class="text-primary">Cadastrar cliente</h4>
                
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
                  Novo cliente
                </button>
                
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



</html>

<?php
    mysqli_close($conecta);
?>
