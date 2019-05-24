<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/entrar.php"); ?>

<!DOCTYPE html>
<html>
   <head>
   <title>CRV Sports</title>
      <?php include '../funcoes/head.php'; ?>
      <link rel="shortcut icon" href="images/icone.png" >
   </head>
   <body>
      <nav class="navbar navbar-expand-md bg-primary navbar-dark">
         <div class="container">
            <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-empire"></i><b> CRV SPORTS</b></a>
         </div>
      </nav>
      <div class="py-5">
         <div class="container">
            <div class="row">
               <div class="col-md-3"> </div>
               <div class="col-md-6">
                  <div class="card text-white p-5 bg-primary">
                     <div class="card-body">
                        <h1 class="mb-4">Faça seu Login</h1>
                         <form class="formLogin" action="login.php" method="post">
                            <label>E-mail</label>
                            <input type="email" name="usuario" class="form-control"  placeholder="Digite seu Email" autocomplete="off">
                             
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha" autocomplete="off">
                             
                            <br>
                            <input type="submit" class="btn btn-secondary" value="Login">

                            <?php if (isset($mensagem)){ ?>
                                <p><?php echo $mensagem ?></p>
                            <?php } ?>

                        </form>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>      

   </body>
</html>

<?php
    if ( isset($_SESSION["user_portal"])){
        header("location:home.php");
    }
    mysqli_close($conecta);
?>