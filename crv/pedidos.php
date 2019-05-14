<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>
<!DOCTYPE html>
<html>
   <head>
      <script src="js/jquery-3.2.1.min.js" language="javascript"></script> 
      
      <?php include '../funcoes/menu.php'; ?>
      <link rel="stylesheet" href="lib\DataTables\DataTables-1.10.18\css\jquery.dataTables.min.css">
      <link rel="stylesheet" href="lib\fontawesome-free-5.8.1-web\css\all.css">
   </head>
   <div class="py-5 text-center bg-light">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="pb-3 text-secondary">Pedidos</h1>
            </div>
         </div>
         <table class="table table-hover table-striped table-bordered" id="produto">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Data</th>
                  <th>Total</th> 
				          <th>Cliente</th>
                  <th>Vendedor</th>
				          <th>Consultar</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query="SELECT p.id_pedido, p.data_pedido, p.total_pedido, c.nome as nome_cliente, f.nome as nome_funcionario FROM
                  pedido p inner join cliente c 
                  inner join funcionario f 
                  ON
                  p.id_cliente = c.id_cliente and p.id_funcionario = f.id_funcionario 
                  WHERE p.tipo = 1";
                  $resultado = mysqli_query($conecta, $query);
                  while($linha = mysqli_fetch_array($resultado)){
					echo '<tr id='.$linha['id_pedido'].'><td>'.$linha['id_pedido'].'</td>';
					echo '<td>'.$linha['data_pedido'].'</td>';
					echo '<td>'.$linha['total_pedido'].'</td>';
					echo '<td>'.utf8_encode($linha['nome_cliente']).'</td>';
					echo '<td>'.utf8_encode($linha['nome_funcionario']).'</td>';
					
					/*
					// Busca o Nome do cliente pelo ID
					$idcliente = $linha['id_cliente'];
					$consulta = mysqli_query($conecta, "SELECT nome FROM cliente WHERE id_cliente ='$idcliente'");
					$resultado = mysqli_fetch_array($consulta);
					$nomecliente = utf8_encode($resultado['nome']);					
					echo '<td>'.$nomecliente.'</td>';
					// Busca o nome do Funcionário pelo ID
					$idfuncionario = $linha['id_funcionario'];
					$consulta = mysqli_query($conecta, "SELECT nome FROM funcionario WHERE id_funcionario ='$idfuncionario'");
					$resultado = mysqli_fetch_array($consulta);
					$nomefuncionario = utf8_encode($resultado['nome']);					
					echo '<td>'.$nomefuncionario.'</td>';	
					*/
                  ?>
               <td><i class="fas fa-search" style="cursor: pointer; color:royalBlue"></td>
               <?php
                  }
				?>
            </tbody>
         </table>
      </div>
   </div>
   
   <div class="py-5 text-center bg-light">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="pb-3 text-secondary">Orçamentos</h1>
            </div>
         </div>
         <table class="table table-hover table-striped table-bordered" id="produto">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Data</th>
                  <th>Total</th>
                  <th>Cliente</th>
                  <th>Vendedor</th>
				  <th>Consultar</th>
				  <th>Editar</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query="SELECT p.id_pedido, p.data_pedido, p.total_pedido, c.nome as nome_cliente, f.nome as nome_funcionario 
                  FROM pedido p 
                  inner join cliente c 
                  inner join funcionario f 
                  ON
                  p.id_cliente = c.id_cliente and 
                  p.id_funcionario = f.id_funcionario 
                  WHERE p.tipo = 0";
                  $resultado = mysqli_query($conecta, $query);
                  while($linha = mysqli_fetch_array($resultado)){
					echo '<tr id='.$linha['id_pedido'].'><td>'.$linha['id_pedido'].'</td>';
					echo '<td>'.$linha['data_pedido'].'</td>';
					echo '<td>'.$linha['total_pedido'].'</td>';
					echo '<td>'.utf8_encode($linha['nome_cliente']).'</td>';
					echo '<td>'.utf8_encode($linha['nome_funcionario']).'</td>';
					/*
					// Busca o Nome do cliente pelo ID
					$idcliente = $linha['id_cliente'];
					$consulta = mysqli_query($conecta, "SELECT nome FROM cliente WHERE id_cliente ='$idcliente'");
					$resultado = mysqli_fetch_array($consulta);
					$nomecliente = utf8_encode($resultado['nome']);					
					echo '<td>'.$nomecliente.'</td>';
					// Busca o nome do Funcionário pelo ID
					$idfuncionario = $linha['id_funcionario'];
					$consulta = mysqli_query($conecta, "SELECT nome FROM funcionario WHERE id_funcionario ='$idfuncionario'");
					$resultado = mysqli_fetch_array($consulta);
					$nomefuncionario = utf8_encode($resultado['nome']);					
					echo '<td>'.$nomefuncionario.'</td>';
					*/
                  ?>
               <td><i class="fas fa-search" style="cursor: pointer; color:royalBlue"></td>
               <td><i class="fas fa-edit" style="cursor: pointer; color:royalBlue"></td>
               <?php
                  }
				?>
            </tbody>
         </table>
      </div>
   </div>
   <?php include 'footer.php'?>
   <script src="js/jquery.js"></script>
   <script type="text/javascript" src="lib\DataTables\datatables.js"></script>
   <script>
	DATATABLE_PTBR = {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "(Filtrados de _MAX_ registros)",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ resultados por página",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
		  "sNext": "Próximo",
		  "sPrevious": "Anterior",
		  "sFirst": "Primeiro",
		  "sLast": "Último"
		},
		"oAria": {
		  "sSortAscending": ": Ordenar colunas de forma ascendente",
		  "sSortDescending": ": Ordenar colunas de forma descendente"
		}
	}
      
	$(document).ready( function (){
	  $('#produto').DataTable(
		{"oLanguage": DATATABLE_PTBR}
	  );
	});
   </script>
</html>
<?php
   mysqli_close($conecta);
 ?>