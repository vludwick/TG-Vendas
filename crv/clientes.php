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
                  <button type="button" id="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
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
            <th>Consultar</th>
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
                <td><i class="fas fa-search" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>
                <td><i class="fas fa-edit" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>
                <td><i class="fas fa-trash-alt"  style="cursor: pointer; color:royalBlue"></td></tr>

            <?php
            }
            ?>
    </tbody>
</table>
</div>
</div>
      
<form id="teste">
  <input type="text" id="acao" name="acao">
  <input type="text" id="id" name="id">
</form>

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
            var id = $(this).parent().parent().attr('id');
            $("#id").val(id);
            $("#acao").val("update");
            $('#teste').trigger("submit");
        });

        $(".fa-search").click( function(){
            var id = $(this).parent().parent().attr('id');
            $("#id").val(id);
            $("#acao").val("read");
            $('#teste').trigger("submit");
        });

        function trataData(data){
          var dia = data.slice(8, 10);
          var mes = data.slice(5, 7);
          var ano = data.slice(0, 4);
          var novaData = dia + "/" + mes + "/" + ano;
          return novaData;
        }
        $('.fa-trash-alt').click(function(event){
          var id = $(this).parent().parent().attr('id');
          $("#id").val(id);
          $("#acao").val("delete").delay(1000);
         
          if(confirm("Deseja mesmo excluir este cliente?")){
            $('#teste').trigger("submit");
          }

        });
        $('#cadastrar').click(function(event){
                $("#operacao").val("cadastrar");
                $("#options").removeAttr("disabled");
                $("#cpf").removeAttr("disabled");
                $("#nome").removeAttr("disabled");
                $("#rg").removeAttr("disabled");
                $("#cnpj").removeAttr("disabled");
                $("#estado").removeAttr("disabled");
                $("#bairro").removeAttr("disabled");
                $("#cidade").removeAttr("disabled");
                $("#telefone").removeAttr("disabled");
                $("#datanasc").removeAttr("disabled");
                $("#inscricao").removeAttr("disabled");
                $("#rua").removeAttr("disabled");
                $("#nomefantasia").removeAttr("disabled");
                $("#email").removeAttr("disabled");
                $("#numero").removeAttr("disabled");
                $("#celular").removeAttr("disabled");
                $("#cep").removeAttr("disabled");
                $("#cpf").val("");
                $("#nome").val("");
                $("#rg").val("");
                $("#cnpj").val("");
                $("#cep").val("");
                $("#estado").val(""); 
                $("#bairro").val("");  
                $("#celular").val("");   
                $("#cidade").val("");
                $("#telefone").val(""); 
                $("#datanasc").attr("type", "date");
                $("#datanasc").val("");
                $("#inscricao").val(""); 
                $("#rua").val("");   
                $("#nomefantasia").val("");
                $("#email").val("");   
                $("#numero").val("");
                $("#enviar").show();
                $("#exampleModalLabel").text("Cadastro de cliente");
        });

                 $('#teste').submit(function(event){
              event.preventDefault();
              var formDados = new FormData($(this)[0]);
              var resultado;
              $.ajax({
                url:'../funcoes/cadcliente.php',
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
                  var fim_nome = data.indexOf("[email] => ");

                  var inicio_email = data.indexOf("[email] => ") + "[email] => ".length;
                  var fim_email = data.indexOf("[logradouro] => ");

                  var inicio_logradouro = data.indexOf("[logradouro] => ") + "[logradouro] => ".length;
                  var fim_logradouro = data.indexOf("[numero] => ");

                  var inicio_numero = data.indexOf("[numero] => ") + "[numero] => ".length;
                  var fim_numero = data.indexOf("[bairro] => ");

                  var inicio_bairro = data.indexOf("[bairro] => ") + "[bairro] => ".length;
                  var fim_bairro = data.indexOf("[cidade] => ");

                  var inicio_cidade = data.indexOf("[cidade] => ") + "[cidade] => ".length;
                  var fim_cidade = data.indexOf("[estado] => ");

                  var inicio_estado = data.indexOf("[estado] => ") + "[estado] => ".length;
                  var fim_estado = data.indexOf("[cep] => ");

                  var inicio_cep = data.indexOf("[cep] => ") + "[cep] => ".length;
                  var fim_cep = data.indexOf("[telefone] => ");

                  var inicio_telefone = data.indexOf("[telefone] => ") + "[telefone] => ".length;
                  var fim_telefone = data.indexOf("[celular] => ");

                  var inicio_celular = data.indexOf("[celular] => ") + "[celular] => ".length;
                  var fim_celular = data.indexOf("[cpf] => ");

                  var inicio_cpf = data.indexOf("[cpf] => ") + "[cpf] => ".length;
                  var fim_cpf = data.indexOf("[rg] => ");

                  var inicio_rg = data.indexOf("[rg] => ") + "[rg] => ".length;
                  var fim_rg = data.indexOf("[datanasc] => ");

                  var inicio_datanasc = data.indexOf("[datanasc] => ") + "[datanasc] => ".length;
                  var fim_datanasc = data.indexOf("[cnpj] => ");

                  var inicio_cnpj = data.indexOf("[cnpj] => ") + "[cnpj] => ".length;
                  var fim_cnpj = data.indexOf("[inscricao] => ");

                  var inicio_inscricao = data.indexOf("[inscricao] => ") + "[inscricao] => ".length;
                  var fim_inscricao = data.indexOf("[nomefantasia] => ");

                  var inicio_fantasia = data.indexOf("[nomefantasia] => ") + "[nomefantasia] => ".length;
                  
                  var acao = data.slice(inicio_acao, fim_acao);
                  var id = data.slice(inicio_id , fim_id);
                  var nome = data.slice(inicio_nome , fim_nome);
                  var email = data.slice(inicio_email , fim_email);
                  var logradouro = data.slice(inicio_logradouro , fim_logradouro);
                  var numero = data.slice(inicio_numero , fim_numero);
                  var bairro = data.slice(inicio_bairro , fim_bairro);
                  var cidade = data.slice(inicio_cidade , fim_cidade);
                  var estado = data.slice(inicio_estado , fim_estado);
                  var cep = data.slice(inicio_cep , fim_cep);
                  var telefone = data.slice(inicio_telefone , fim_telefone);
                  var celular = data.slice(inicio_celular , fim_celular);
                  var cpf = data.slice(inicio_cpf , fim_cpf);
                  var rg = data.slice(inicio_rg , fim_rg);
                  var datanasc = data.slice(inicio_datanasc , fim_datanasc);
                  var cnpj = data.slice(inicio_cnpj , fim_cnpj);
                  var inscricao = data.slice(inicio_inscricao , fim_inscricao);
                  var fantasia = data.slice(inicio_fantasia, data.trim().length-1);
                  datanasc = trataData(datanasc);
                  
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
                      $("#pk").val(id.trim());
                      $("#operacao").val("editar");
                      $("#options").attr("disabled", "true");
                      $("#cpf").attr("disabled", "true");
                      $("#rg").removeAttr("disabled");
                      $("#cnpj").attr("disabled", "true");
                      $("#estado").removeAttr("disabled");
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