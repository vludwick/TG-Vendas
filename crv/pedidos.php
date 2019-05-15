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
         <table class="table table-hover table-striped table-bordered" id="pedido">
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
                  ?>
               <td><i class="fas fa-search" data-toggle="modal" data-target="#consultapedido" style="cursor: pointer; color:royalBlue"></td>
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
         <table class="table table-hover table-striped table-bordered" id="orcamento">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Data</th>
                  <th>Total</th>
                  <th>Cliente</th>
                  <th>Vendedor</th>
                  <th>Consultar</th>
                  <th>Editar</th>
                  <th>Excluir</th>

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
					$idpedido = $linha['id_pedido'];
                  ?>
               <td><i class="fas fa-search" data-toggle="modal" data-target="#consultapedido" style="cursor: pointer; color:royalBlue"></td>
               <td><a href="editaorcamentos.php?id=<?php echo $linha['id_pedido'] ?>"> <i class="fas fa-edit" style="cursor: pointer; color:royalBlue"></a></td>
               <td><i class="fas fa-trash-alt" style="cursor: pointer; color:royalBlue" onclick="deletapedido(<?php echo $idpedido; ?>)"></td>
               </tr>
               
               <?php
                  }
				?>
            </tbody>
         </table>
		 <div id="res_server"></div>
      </div>
      <form id="teste">
         <input type="hidden" id="acao" name="acao">
         <input type="hidden" id="id" name="id">
      </form>
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
		$('#pedido').DataTable(
		{"oLanguage": DATATABLE_PTBR});
		$('#orcamento').DataTable(
		{"oLanguage": DATATABLE_PTBR});
	});
	
   $(document).on('click',".fa-search", function(){
            var id = $(this).parent().parent().attr('id');
            $("#id").val(id);
            $("#acao").val("read");
            $('#teste').trigger("submit");
    });
	
	$('#teste').submit(function(event){
	  event.preventDefault();
	  var formDados = new FormData($(this)[0]);
	  var resultado;
	  $.ajax({
		url:'../funcoes/cadpedido.php',
		type:'POST',
		data:formDados,
		cache:false,
		contentType:false,
		processData:false,
		success:function (data)
		{
		  console.log(data);
		  var inicio_data = data.indexOf("[data] => ") + "[data] => ".length;
		  var fim_data = data.indexOf("[total] => ");
		  var inicio_total = data.indexOf("[total] => ") + "[total] => ".length;
		  var fim_total = data.indexOf("[cliente] => ");
		  var inicio_cliente = data.indexOf("[cliente] => ") + "[cliente] => ".length;
		  var fim_cliente = data.indexOf("[funcionario] => ");
		  var inicio_funcionario = data.indexOf("[funcionario] => ") + "[funcionario] => ".length;
		  var fim_funcionario = data.indexOf("[table] => ");
		  var inicio_table = data.indexOf("[table] => ") + "[table] => ".length;
		  
		  
		  var data_ped = data.slice(inicio_data , fim_data);
		  var total = data.slice(inicio_total , fim_total);
		  var cliente = data.slice(inicio_cliente , fim_cliente);
		  var funcionario = data.slice(inicio_funcionario , fim_funcionario);
		  var table = data.slice(inicio_table, data.trim().length-1);
		  $("#data").val(data_ped);
		  $("#cliente").val(cliente);
		  $("#funcionario").val(funcionario);
		  $("#total").val(total);
		  $("#tabela").html(table);
		  $('#itens').DataTable().destroy();
		  $('#itens').DataTable(
			   {"oLanguage": DATATABLE_PTBR
			 });
		  },
		dataType:'text'
	  });
	  return false;
	});
	
	function deletapedido(id) {		
		var idpedido = id;
		$.post("../funcoes/deletaorcamento.php", {idpedido:idpedido}, function(retorno){
			$("#res_server").html(retorno);
		});	  
	}
	
   </script>
   <?php require_once("../funcoes/modalpedido.php"); ?>
</html>
<?php
   mysqli_close($conecta);
 ?>