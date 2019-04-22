<?php require_once("../funcoes/conexao.php"); ?>
<?php require_once("../funcoes/sessao.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-3.2.1.min.js" language="javascript"></script> 
    <?php require_once("../funcoes/modalproduto.php"); ?>
    <?php include '../funcoes/menu.php'; ?>
  <link rel="stylesheet" href="lib\DataTables\DataTables-1.10.18\css\jquery.dataTables.min.css">
    <link rel="stylesheet" href="lib\fontawesome-free-5.8.1-web\css\all.css">
</head>
  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary">Produtos</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-10">
          <div class="row my-5">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
                  Novo Produto
                </button>
        </div>
      </div>
    </div>
    <table class="table table-hover table-striped table-bordered" id="produto">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade vendida</th>
            <th>Valor vendido</th>
            <th>Consultar</th>
            <th>Editar</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $query="select p.id_produto, p.nome, p.descricao, p.preco, sum(pp.quantidade) as quantidade_vendida, sum(pp.valor_total) as total_vendido
            from produto p 
            left join 
            pedido_produto pp
            on p.id_produto = pp.id_pedido
            GROUP BY nome";
            $resultado = mysqli_query($conecta, $query);
            while($linha = mysqli_fetch_array($resultado)){
                echo '<tr id='.$linha['id_produto'].'><td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['descricao'].'</td>';
                echo '<td>'.$linha['preco'].'</td>';
                if($linha['quantidade_vendida'] == null and $linha['total_vendido'] == null){
                  echo '<td>0</td>';
                  echo '<td>0</td>';
                }else{
                  echo '<td>'.$linha['quantidade_vendida'].'</td>';
                  echo '<td>'.$linha['total_vendido'].'</td>';
                }
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

        } );
    </script>

</html>

<?php
    mysqli_close($conecta);
?>
