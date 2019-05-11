<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>
<!DOCTYPE html>
<html>
   <head>
      <script src="js/jquery-3.2.1.min.js" language="javascript"></script> 
      <?php require_once("../funcoes/modalpedido.php"); ?>
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
                  $query="select * from pedido where tipo = '1';";
                  $resultado = mysqli_query($conecta, $query);
                  while($linha = mysqli_fetch_array($resultado)){
					echo '<tr id='.$linha['id_pedido'].'><td>'.$linha['id_pedido'].'</td>';
					echo '<td>'.$linha['data_pedido'].'</td>';
					echo '<td>'.$linha['total_pedido'].'</td>';
					echo '<td>'.$linha['id_cliente'].'</td>';
					echo '<td>'.$linha['id_funcionario'].'</td>';
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
               </tr>
            </thead>
            <tbody>
               <?php
                  $query="select * from pedido where tipo = '0';";
                  $resultado = mysqli_query($conecta, $query);
                  while($linha = mysqli_fetch_array($resultado)){
					echo '<tr id='.$linha['id_pedido'].'><td>'.$linha['id_pedido'].'</td>';
					echo '<td>'.$linha['data_pedido'].'</td>';
					echo '<td>'.$linha['total_pedido'].'</td>';
					echo '<td>'.$linha['id_cliente'].'</td>';
					echo '<td>'.$linha['id_funcionario'].'</td>';
                  ?>
               <td><i class="fas fa-search" data-toggle="modal" data-target="#consultapedido" style="cursor: pointer; color:royalBlue"></td>
               <td><i class="fas fa-edit" style="cursor: pointer; color:royalBlue"></td>
               <?php
                  }
				?>
            </tbody>
         </table>
      </div>
      <form id="teste">
         <input type="text" id="acao" name="acao">
         <input type="text" id="id" name="id">
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
		{"oLanguage": DATATABLE_PTBR}
	  );
     $('#orcamento').DataTable(
		{"oLanguage": DATATABLE_PTBR}
	  );
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
                  $("#tabela").html(data);
                  $('#itens').DataTable().destroy();
            $('#itens').DataTable(
		         {"oLanguage": DATATABLE_PTBR}
	         );
                  /*
                  var inicio_acao = data.indexOf("[acao] => ") + "[acao] => ".length;
                  var fim_acao = data.indexOf("[id] => ");

                  

                  var inicio_fantasia = data.indexOf("[nomefantasia] => ") + "[nomefantasia] => ".length;
                  
                  
                  var inscricao = data.slice(inicio_inscricao , fim_inscricao);
                  var fantasia = data.slice(inicio_fantasia, data.trim().length-1);
                  datanasc = trataData(datanasc);
                  
                  
                      $("#cpf").val(cpf);

                        */
                  },
                dataType:'text'
              });
              return false;
              
              
              });
   </script>
</html>
<?php
   mysqli_close($conecta);
 ?>