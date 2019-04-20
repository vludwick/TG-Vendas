<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>
<!DOCTYPE html>
<html>
   <head>
      <script src="js/jquery-3.2.1.min.js" language="javascript"></script> 
      <link rel="stylesheet" href="lib\DataTables\DataTables-1.10.18\css\jquery.dataTables.min.css">
      <?php require_once("../funcoes/modalcliente.php"); ?>
      <?php include '../funcoes/menu.php'; ?>
      <link rel="stylesheet" href="lib\fontawesome-free-5.8.1-web\css\all.css">
   </head>
   <div class="py-5 text-center bg-light">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="pb-3 text-secondary">Funcionários</h1>
            </div>
         </div>
         <table class="table table-hover table-striped table-bordered" id="cliente">
            <thead>
               <tr>
                <th>Id Funcionário</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Data Admissão</th>
                <th>Cargo</th>
                <th>Consultar</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query="select * from funcionario;";
                  $resultado = mysqli_query($conecta, $query);
                  while($linha = mysqli_fetch_array($resultado)){
                      echo '<tr id='.$linha['id_funcionario'].'><td>'.$linha['id_funcionario'].'</td>';
                      echo '<td>'.utf8_encode($linha['nome']).'</td>';
                      echo '<td>'.utf8_encode($linha['email']).'</td>';
                      echo '<td>'.utf8_encode($linha['celular']).'</td>';
                      echo '<td>'.utf8_encode($linha['data_admissao']).'</td>';
                      if($linha['tipo'] == '1')
                          $tipo = 'Vendedor';
                      else
                          $tipo = 'Gerente Comercial';
                      echo '<td>'.utf8_encode($tipo).'</td>';

                  ?>
               <td><i class="fas fa-search" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
         </table>
      </div>
   </div>
   <form id="teste">
      <input type="hidden" id="id" name="id">
   </form>
   </div>
   </div>
   <?php include 'footer.php'; ?>
   <script src="js/jquery.js"></script>
   <script type="text/javascript" src="lib\DataTables\datatables.js"></script>
   <script>

   </script>
</html>
<?php
    mysqli_close($conecta);
?>