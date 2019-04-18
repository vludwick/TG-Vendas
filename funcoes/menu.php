<?php require_once("sessao.php"); ?>
<!DOCTYPE html>
<html>

<head>
<?php require_once("head.php"); ?>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="home.php"><i class="fab d-inline fa-lg fa-empire"></i><b> CRV SPORTS</b></a>
        <?php
            if  (isset($_SESSION["user_portal"]) )   
            {
                $user = $_SESSION["user_portal"];

                $saudacao = "select nome ";
                $saudacao .= "from funcionario ";
                $saudacao .= "where id_funcionario = {$user} ";

                $saudacao_login = mysqli_query($conecta, $saudacao);

                if(!$saudacao_login){
                    die("Falha no banco.");
                }

                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $nome = $saudacao_login["nome"];
                $nome = explode(" ", $nome);
        ?>
            <div id="header_saudacao"><a class="btn navbar-btn ml-2 text-white btn-primary"> <?php echo $nome[0] ?> </a></div>
        <?php } ?>
      
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle docs navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="clientes.php"><i class="fa d-inline fa-lg fa-shopping-"></i> Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="4Clifor.html"><i class="fa d-inline fa-lg fa-o"></i>Orçamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vendas.php"><i class="fa d-inline fa-lg fa-o"></i>Venda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produtos.php"><i class="fa d-inline fa-lg fa-o"></i>Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="8Orcamento.html"><i class="fa d-inline fa-lg fa-o"></i>Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="10Representante.html"><i class="fa d-inline fa-lg fa-o"></i> Faturamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="10Representante.html"><i class="fa d-inline fa-lg fa-o"></i> Funcionários</a>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-primary" href="../funcoes/sair.php"><i class="fas d-inline fa-lg fa-sign-out-alt"></i> Sair</a>
      </div>
    </div>
  </nav>
