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
                echo '<tr id='.$linha['id_cliente'].'><td>'.$linha['id_cliente'].'</td>';
                echo '<td>'.utf8_encode($linha['nome']).'</td>';
          ?>
            
                <td><i class="fas fa-edit" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue">
            </a></td>
                <td><i class="fas fa-trash-alt" style="cursor: pointer; color:royalBlue">
            </a></td></tr>

            <?php
            }
            ?>
    </tbody>
</table>
        </div>
      
<form id="teste">
  <input type="hidden" id="id" name="id">
</form>
<div id="res_teste">
</div>
    </div>
  </div>
<?php include 'footer.php'; ?>
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
            $('#cliente').DataTable(
              {"oLanguage": DATATABLE_PTBR}
            );
        });

        $(".fa-edit").click( function(){
            var id = $(this).parent().parent().attr('id')
            $("#id").val(id);
            $('#teste').trigger("submit");
        });

          $('#teste').submit(function(event){
            event.preventDefault();
            var formDados = new FormData($(this)[0]);
            var resultado;
            $.ajax({
              url:'../funcoes/teste.php',
              type:'POST',
              data:formDados,
              cache:false,
              contentType:false,
              processData:false,
              success:function (data)
                {
                $("#res_teste").html(data);
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