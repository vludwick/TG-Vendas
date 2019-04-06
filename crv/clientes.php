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
          <h1 class="pb-3 text-secondary">Gerenciador de Clientes</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-10">
          <div class="row my-5">
                
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
                  Cadastrar cliente
                </button>
            </div>
          </div>
          
      </div>
      <table class="table table-hover table-striped table-bordered" id="cliente">
    <thead>
        <tr>
            <th>Id Cliente</th>
            <th>Nome</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query="select * from cliente;";
            $resultado = mysqli_query($conecta, $query);
            while($linha = mysqli_fetch_array($resultado)){
                echo '<tr class='.$tipo.'><td>'.$linha['id_cliente'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
          ?>
            
                <td><a href="#"><i class="fas fa-edit">
            </a></td>
                <td><a href="#"><i class="fas fa-trash-alt">
            </a></td></tr>

            <?php
            }
            ?>
    </tbody>
</table>
    </div>
  </div>
<?php include 'footer.php'; ?>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="lib\DataTables\datatables.js"></script>

    <script>
        $(document).ready( function (){
            $('#cliente').DataTable();

        } );
    </script>


</html>

<?php
    mysqli_close($conecta);
?>
