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
        
        <div class="input-group mb-1">
        <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Ano</label>
        </div>
            
        <select  name="seletorAno" onchange="javascript:mostraAlerta(this)" class="custom-select" id="inputGroupSelect01" style="max-width: 16%;">
            <?php
            $query=
            "SELECT 
                sum(total_pedido)as totalmes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', -2), '-', 1) AS mes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', 1) AS ano,
                count(data_pedido) as quantidade
            from pedido 
            where tipo = 1
            group by ano";
        
            $resultado = mysqli_query($conecta, $query);
            $tamanho = array();
            $cont = 0;
            while($linha = mysqli_fetch_array($resultado)){
                $cont++;
                $tamanho['cont'] = $linha['ano'];
                echo $tamanho['cont'];
                echo '<option selected value="'.$tamanho[cont].'">'.$tamanho[cont].'</option>';
            }
            
            

            ?>
        </select>
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
    
    <tbody id="resultado_busc">
        <?php
            $query=
            "SELECT 
                sum(total_pedido)as totalmes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', -2), '-', 1) AS mes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', 1) AS ano,
                count(data_pedido) as quantidade
                
            from pedido 
            where tipo = 1
            group by mes, ano";
        
            $resultado = mysqli_query($conecta, $query);
            $totalano = 0;
            $vendasAno = 0;
            while($linha = mysqli_fetch_array($resultado)){
                
                switch ($linha['mes']) {
                    case 1: $mees = 'Janeiro'; break;
                    case 2: $mees = 'Fevereiro'; break;
                    case 3: $mees = 'Mar&ccedilo'; break;
                    case 4: $mees = 'Abril'; break;
                    case 5: $mees = 'Maio'; break;
                    case 6: $mees = 'Junho'; break;
                    case 7: $mees = 'Julho'; break;
                    case 8: $mees = 'Agosto'; break;
                    case 9: $mees = 'Setembro'; break;
                    case 10: $mees = 'Outubro'; break;
                    case 11: $mees = 'Novembro'; break;
                    case 12: $mees = 'Dezembro'; break;
                }
                if(utf8_encode($linha['ano']) == $tamanho['cont']){
                echo '<tr id='.$linha['mes'].'><td>'.utf8_encode($mees).'</td>';
                echo '<td>'.utf8_encode($linha['ano']).'</td>';
                $number = number_format($linha['totalmes'], 2, ',', '.');
                echo '<td>R$ '.utf8_encode($number).'</td>';
                echo '<td>'.$linha['quantidade'].'</td></tr>';
                $totalano = $totalano + $linha['totalmes'];
                $vendasAno = $vendasAno + $linha['quantidade'];
            }
                
        ?>
                
            <?php
            }
            echo '<tr><td colspan="2">Total do ano:</td>';
            echo '<td>R$ '.number_format($totalano, 2, ',', '.').'</td>';
            echo '<td>'.$vendasAno.'</td></tr>';
            ?>
    
    </tbody>
        
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  </div>
  </div>
  <?php include 'footer.php'?>

  <script src="js/jquery.js"></script>
    <script type="text/javascript" src="lib\DataTables\datatables.js"></script>
  <script>
    DATATABLE_PTBR = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "",
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
              {"oLanguage": DATATABLE_PTBR,
                "lengthChange": false}
            );

        } );
      
      function mostraAlerta(elemento)
    {
        var ano = elemento.value;
        
        $.ajax({
		method: 'post',
		url: 'sys/sys.php',
		data: {Ano: ano, faturamento: 'sim'},
		dataType: 'json',
		success: function(retorno){                
			$('#resultado_busc').html(retorno.dados);
			
		}
		});
    }
        
    </script>
    
</html>

<?php
    mysqli_close($conecta);
?>
