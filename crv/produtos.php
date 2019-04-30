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
        <button type="button" id="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
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
                echo '<tr id='.$linha['id_produto'].'><td>'.utf8_encode($linha['nome']).'</td>';
                echo '<td>'.utf8_encode($linha['descricao']).'</td>';
                echo '<td>'.$linha['preco'].'</td>';
                if($linha['quantidade_vendida'] == null and $linha['total_vendido'] == null){
                  echo '<td>0</td>';
                  echo '<td>0</td>';
                }else{
                  echo '<td>'.$linha['quantidade_vendida'].'</td>';
                  echo '<td>'.$linha['total_vendido'].'</td>';
                }
          ?>
                <td><i class="fas fa-search" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>
                <td><i class="fas fa-edit" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>

            <?php
            }
            ?>
    </tbody>
</table>

<form id="teste">
  <input type="hidden" id="acao" name="acao">
  <input type="hidden" id="id" name="id">
</form>
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

        $(document).on('click', ".fa-edit", function(){
            var id = $(this).parent().parent().attr('id');
            $("#id").val(id);
            $("#acao").val("update");
            $('#teste').trigger("submit");
            $('#foto').hide();
            $('#foto').removeAttr("required");
            $('#editafoto').show();
            $('#imagem').show();
        });

        $(document).on('click',".fa-search", function(){
            var id = $(this).parent().parent().attr('id');
            $("#id").val(id);
            $("#acao").val("read");
            $('#teste').trigger("submit");
            $('#foto').hide();
            $('#editafoto').hide();
            $('#imagem').show();
        });


        $('#cadastrar').click(function(event){
                $("#res_server").html("");
                $("#operacao").val("cadastrar");
                $("#nome").removeAttr("disabled");
                $("#preco").removeAttr("disabled");
                $("#descricao").removeAttr("disabled");
                $("#quantidade").removeAttr("disabled");
                $("#foto").removeAttr("disabled");
                $("#preco").val("");
                $("#nome").val("");
                $("#descricao").val("");
                $("#quantidade").val("");
                $("#foto").val("");
                $("#enviar").show();
                $("#exampleModalLabel").text("Cadastro de produto");
                $('#foto').show();
                $('#editafoto').hide();
                $('#imagem').hide();
        });

        $('#teste').submit(function(event){
              event.preventDefault();
              var formDados = new FormData($(this)[0]);
              var resultado;
              $.ajax({
                url:'../funcoes/cadproduto.php',
                type:'POST',
                data:formDados,
                cache:false,
                contentType:false,
                processData:false,
                success:function (data)
                {
                  console.log(data);
                  
                  var inicio_acao = data.indexOf("[acao] => ") + "[acao] => ".length;
                  var fim_acao = data.indexOf("[id] => ");

                  var inicio_id = data.indexOf("[id] => ") + "[id] => ".length;
                  var fim_id = data.indexOf("[nome] => ");
                  
                  var inicio_nome = data.indexOf("[nome] => ") + "[nome] => ".length;
                  var fim_nome = data.indexOf("[preco] => ");

                  var inicio_preco = data.indexOf("[preco] => ") + "[preco] => ".length;
                  var fim_preco = data.indexOf("[descricao] => ");

                  var inicio_descricao = data.indexOf("[descricao] => ") + "[descricao] => ".length;
                  var fim_descricao = data.indexOf("[quantidade] => ");

                  var inicio_quantidade = data.indexOf("[quantidade] => ") + "[quantidade] => ".length;
                  var fim_quantidade = data.indexOf("[foto] => ");

                  var inicio_foto = data.indexOf("[foto] => ") + "[foto] => ".length;
 
                  
                  var acao = data.slice(inicio_acao , fim_acao);
                  var id = data.slice(inicio_id , fim_id);
                  var nome = data.slice(inicio_nome , fim_nome);
                  var preco = data.slice(inicio_preco , fim_preco);
                  var descricao = data.slice(inicio_descricao , fim_descricao);
                  var quantidade = data.slice(inicio_quantidade , fim_quantidade);
                  var foto = data.slice(inicio_foto, data.trim().length-1);
                  foto = 'images\\fotos\\'+ foto;

                if(acao.trim() == "update"){
                  $("#res_server").html("");
                  $("#operacao").val("editar");
                  $("#nome").removeAttr("disabled");
                  $("#preco").removeAttr("disabled");
                  $("#descricao").removeAttr("disabled");
                  $("#quantidade").removeAttr("disabled");
                  $("#foto").removeAttr("disabled");
                
                  $("#enviar").show();
                  $("#nome").val(nome);
                  $("#preco").val(preco);
                  $("#descricao").val(descricao);
                  $("#pk").val(id.trim());
                  
                  $("#exampleModalLabel").text("Edição de produto");
                  $("#enviar").show();
                  console.log("Quantidade:");
                  console.log(Number.isInteger(parseInt(quantidade)));
                  $("#quantidade").val(parseInt(quantidade));
                  
                  $("#imagem").attr("src", foto);
                }
                else if(acao.trim() == "read"){
                  $("#res_server").html("");
                  $("#operacao").val("cadastrar");
                  $("#nome").attr("disabled", "true");
                  $("#preco").attr("disabled", "true");
                  $("#descricao").attr("disabled", "true");
                  $("#quantidade").attr("disabled", "true");
                  $("#foto").attr("disabled", "true");

                  $("#enviar").hide();
                  $("#nome").val(nome);
                  $("#preco").val(preco);
                  $("#descricao").val(descricao);
                  $("#imagem").attr("src", foto);
                 
                  $("#quantidade").val(parseInt(quantidade));
                  $("#exampleModalLabel").text("Consulta de produto");
                  $("#enviar").hide();
                }
 

                  /*
                  if(acao.trim() == "read"){
                      if(cpf.length < 19){
                        $("#options").val("2");
                        document.getElementById("fisica").style.display = "none";
                        document.getElementById("fisica1").style.display = "none";
                        document.getElementById("fisica2").style.display = "none";
                        document.getElementById("juridica").style.display = "block";
                        document.getElementById("juridica1").style.display = "block";
                        document.getElementById("juridica2").style.display = "block";
        
                      }else{
                        $("#options").val("1");
                        document.getElementById("fisica").style.display = "block";
                        document.getElementById("fisica1").style.display = "block";
                        document.getElementById("fisica2").style.display = "block";
                        document.getElementById("juridica").style.display = "none";
                        document.getElementById("juridica1").style.display = "none";
                        document.getElementById("juridica2").style.display = "none";
      
                      }
                      $("#res_server").html("");
                      $("#options").attr("disabled", true);
                      $("#cpf").attr("disabled", true);
                      $("#nome").attr("disabled", "true");
                      $("#rg").attr("disabled", "true");
                      $("#cnpj").attr("disabled", "true");
                      $("#estado").attr("disabled", "true");
                      $("#bairro").attr("disabled", "true");
                      $("#cidade").attr("disabled", "true");
                      $("#telefone").attr("disabled", "true");
                      $("#datanasc").attr("disabled", "true");
                      $("#inscricao").attr("disabled", "true");
                      $("#rua").attr("disabled", "true");
                      $("#nomefantasia").attr("disabled", "true");
                      $("#email").attr("disabled", "true");
                      $("#numero").attr("disabled", "true");
                      $("#celular").attr("disabled", "true");
                      $("#cep").attr("disabled", "true");
                      $("#cpf").val(cpf);
                      $("#nome").val(nome);
                      $("#rg").val(rg);
                      $("#cnpj").val(cnpj);
                      $("#cep").val(cep);
                      $("#estado").val(estado);  
                      $("#bairro").val(bairro);  
                      $("#celular").val(celular);   
                      $("#cidade").val(cidade);
                      $("#telefone").val(telefone);  
                      $("#datanasc").attr("type", "text");
                      $("#datanasc").val(datanasc);
                      $("#inscricao").val(inscricao);   
                      $("#rua").val(logradouro);   
                      $("#nomefantasia").val(fantasia); 
                      $("#email").val(email);   
                      $("#numero").val(numero);
                      $("#enviar").hide();
                      $("#exampleModalLabel").text("Consulta de cliente");
                  }else if(acao.trim() == "update"){
                    if(cpf.length < 19){
                        $("#options").val("2");
                        document.getElementById("fisica").style.display = "none";
                        document.getElementById("fisica1").style.display = "none";
                        document.getElementById("fisica2").style.display = "none";
                        document.getElementById("juridica").style.display = "block";
                        document.getElementById("juridica1").style.display = "block";
                        document.getElementById("juridica2").style.display = "block";
        
                      }else{
                        $("#options").val("1");
                        document.getElementById("fisica").style.display = "block";
                        document.getElementById("fisica1").style.display = "block";
                        document.getElementById("fisica2").style.display = "block";
                        document.getElementById("juridica").style.display = "none";
                        document.getElementById("juridica1").style.display = "none";
                        document.getElementById("juridica2").style.display = "none";
      
                      }
                      $("#res_server").html("");
                      $("#pk").val(id.trim());
                      $("#operacao").val("editar");
                      $("#options").attr("disabled", "true");
                      $("#cpf").attr("disabled", "true");
                      $("#rg").removeAttr("disabled");
                      $("#cnpj").attr("disabled", "true");
                      $("#estado").removeAttr("disabled");
                      $("#nome").removeAttr("disabled");
                      $("#bairro").removeAttr("disabled");
                      $("#cidade").removeAttr("disabled");
                      $("#telefone").removeAttr("disabled");
                      $("#datanasc").attr("disabled", "true");
                      $("#inscricao").attr("disabled", "true");
                      $("#rua").removeAttr("disabled");
                      $("#nomefantasia").removeAttr("disabled");
                      $("#email").removeAttr("disabled");
                      $("#numero").removeAttr("disabled");
                      $("#celular").removeAttr("disabled");
                      $("#cep").removeAttr("disabled");
                      $("#cpf").val(cpf.trim());
                      $("#nome").val(nome.trim());
                      $("#rg").val(rg.trim());
                      $("#cnpj").val(cnpj.trim());
                      $("#cep").val(cep.trim());
                      $("#estado").val(estado.trim());  
                      $("#bairro").val(bairro.trim());  
                      $("#celular").val(celular.trim());   
                      $("#cidade").val(cidade.trim());
                      $("#telefone").val(telefone.trim());  
                      $("#datanasc").attr("type", "text");
                      $("#datanasc").val(datanasc.trim());
                      $("#inscricao").val(inscricao.trim());   
                      $("#rua").val(logradouro.trim());   
                      $("#nomefantasia").val(fantasia.trim()); 
                      $("#email").val(email.trim());   
                      $("#numero").val(numero.trim());
                      $("#enviar").show();
                      $("#exampleModalLabel").text("Edição de cliente");
                  }
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
