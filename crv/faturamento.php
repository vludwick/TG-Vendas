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
          <h1 class="pb-3 text-secondary">Faturamento</h1>
        </div>
      </div>
      
    <table class="table table-hover table-striped table-bordered" id="faturamento">
    <thead>
        <tr>
            <th>Mês</th>
            <th>Ano</th>
            <th>Total do Mês</th>
            <th>Número de Vendas</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            $query=
            "SELECT 
                sum(total_pedido)as totalmes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', 2), '-', -1) AS mes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', -1) AS ano,
                count(data_pedido) as quantidade
            from pedido 
            group by mes, ano";
        
            $resultado = mysqli_query($conecta, $query);
            while($linha = mysqli_fetch_array($resultado)){
                echo '<tr id='.$linha['mes'].'><td>'.utf8_encode($linha['mes']).'</td>';
                echo '<td>'.utf8_encode($linha['ano']).'</td>';
                $number = number_format($linha['totalmes'], 2, ',', '.');
                echo '<td>'.utf8_encode($number).'</td>';
                echo '<td>'.$linha['quantidade'].'</td></tr>';
          ?>
                
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
            $('#faturamento').DataTable(
              {"oLanguage": DATATABLE_PTBR}
            );

        } );
        
    </script>
    
</html>

<?php
    mysqli_close($conecta);
?>
