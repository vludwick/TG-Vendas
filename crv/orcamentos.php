<?php 
    require_once("../funcoes/conexao.php"); require_once("../funcoes/sessao.php"); 
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
<!DOCTYPE html>
<html>

<head>
  <?php include '../funcoes/menu.php'; ?>
  <link rel="stylesheet" href="lib\fontawesome-free-5.8.1-web\css\all.css">
    
    <link href="css/style1.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/functions1.js"></script>
    <?php require_once("../funcoes/modalcliente.php"); ?>
    
</head>

<body>

    
<div class="py-5 text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="pb-3 text-secondary">Criar Orçamento</h1>
            </div>
        </div>
        <div class="row" id="clienteprocura" style="margin-top: 45px;">
             

            <div class="col-md-3 offset-md-10">
                <div class="row my-0">
                    <button style="" type="button" id="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#cadastroCliente">
                    Cadastrar cliente
                    </button>
                </div>
            </div>
            <div class="col-md-4 offset-md-0">
                <div class="row my-1">
                    <input  style="margin-left: 50px; margin-top: -40px" class="form-control cpfOuCnpj" type="form-control" id="buscacliente" name="buscacliente" placeholder="CPF ou CNPJ" autocomplete="off">
                </div>
            </div> 
        </div>
    </div>
</div>
    
    <div style="margin-top: -25px;" class="container">
        <form action="" method="post" enctype="multipart/form-data" id="form_busca">
            <div  class="row">
                <div class="col-md-8">
                    <label style="margin-left: -10px" class="col-sm-10 col-form-label">Código do Produto:</label>
                    <input  class="form-control" type="form-control" id="busca" name="buscar" placeholder="Código de barras" autocomplete="off">
                </div>

                <div class="form-group col-md-3">
                    <label style="margin-left: -10px" class="col-sm-10 col-form-label">Quantidade:</label>
                    <input  class="form-control" id="quantidade" name="quantidade" value="1" min="1" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" type="number" placeholder="Qtd." required>
                </div>
            </div>
        </form>

        <div style="margin-left: 20px" class="row">
            <div class="col-md-4">
                <label class="sm-10 col-form-label">Preço:</label>
            </div>
            <div class="col-md-4"> 
                <label class="sm-10 col-form-label">Total:</label>
            </div>  

            <div class="col-md-4"> 
                <label class="sm-10 col-form-label">Produto:</label>
            </div>
        </div>

        <div style="margin-left: 20px" class="row">                    
            <div id="resultado_busca1" class="col-md-4">

                <input  type="form-control" class="form-control" name="precoproduto" id="precoproduto" disabled>
            </div>
            <div id="resultado_busca2" class="col-md-4"> 

                <input type="form-control" class="form-control" id="totalproduto" name="totalproduto" disabled>
            </div>  

            <div id="resultado_busca" class="col-md-4"> 
                <a  type="form-control" class="form-control" style="width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>
            </div>
        </div>	
        
        
        <div style="margin-left: 20px" class="row">
            <div class="col-md-6">
                <label class="sm-10 col-form-label">Nome do Cliente:</label>                
            </div>
        </div>
        <form id="vendas" action="" method="post" enctype="multipart/form-data">
        <div style="" class="row">                    
            <div id="resultado_busca4" class="col-md-6">
                <input  type="form-control" class="form-control" name="idcliente" id=""  required disabled>
            </div>
            <div  class="col-md-2">
                <input  type="hidden" class="form-control"  >
            </div>
            <div id="cancela_pedido"  class="col-md-4 " > 
                <?php if($total > 0){ ?>
                <a   type="form-control" class="form-control" style="cursor: pointer;width:60%;padding:6px;border-color:#dc3545;background:#dc3545;;font:16px;color:white;text-decoration:none;text-align: center;" name="cancelar" id="cancelar"><i ></i>Cancelar Orçamento</a>
               <?php } ?> 
            </div>
            
            <div  class="col-md-3">
                <input  type="hidden" class="form-control" name="idfuncionario" id="idfuncionario" >
            </div> 
            <div id="resultado_busca5" class="col-md-3">
                <input  type="hidden" class="form-control" name="id_cliente" id="id_cliente" value="" >
            </div>            
        </div>			
		  
            <br/><br/><br/>
            <table class="table table-hover table-striped table-bordered" >
                <thead>
                    <tr>
                        <td>Produto</td>
                        <td>Valor</td>
                        <td>Qtd</td>
                        <td>Subtotal</td>
                        <td>Excluir</td>
                    </tr>
                </thead>

                <tbody id="content_retorno">
                    <?php
                        $total = 0;
                        $qtdProdutosPedidos = 0;
						$idProdutos = array(); // Array que armazena todos os IDs dos produtos que estão no Pedido (para conseguir referenciar o name do input pra pegar os dados)
						session_start();
                        $_SESSION["ids"] = $idProdutos;
						$_SESSION["qtdProdutosPedidos"] = $qtdProdutosPedidos;
						                    
                        if(count($_SESSION['carrinho']) > 0):
                        foreach($_SESSION['carrinho'] as $idProd => $qtd){
                        $pegaProduto = $pdo->prepare("SELECT * FROM `produto` WHERE `id_produto` = ?");
                        $pegaProduto->execute(array($idProd));
                        $dadosProduto = $pegaProduto->fetchObject();
                        $subTotal = ($dadosProduto->preco*$qtd);
                        $total += $subTotal;

                        echo '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.number_format($dadosProduto->preco, 2, ',', '.').'</td><td><input type="text" id="qtd" style="text-align: center;" disabled value="'.$qtd.'" size="3"  /></td>';
                        echo '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="cursor: pointer;width:50%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';			
						echo '<tr><td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'id" value="'.$dadosProduto->id_produto.'"></td>';
						echo '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'preco" value="'.$dadosProduto->preco.'"></td>';
						echo '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'qtd" value="'.$qtd.'"></td>';
						echo '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'subtotal" value="'.$subTotal.'"></td></tr>';	
                        }
                            			
						echo '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
						echo '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar</button></td></tr>';
						echo '<td><input type="hidden" id="" name="total" value="'.$total.'"></td>';
                        endif;

                        // Input com o total do pedido e com a quantidade de produtos pedidos
                        echo '<input type="hidden" id="" name="total" value="'.$total.'">';
                        echo '<input type="hidden" id="" name="qtdProdutosPedidos" value="'.$qtdProdutosPedidos.'">';
						echo '<input type="hidden" id="" name="codcli" value="1">';
						echo '<input type="hidden" id="" name="codfun" value="2">';
                        // Criando uma sessão com a array que tem os IDS dos produtos que estao nesse pedido

                    ?>

                    <div id="res_server"></div>
                </tbody>
            </table>
           
            
                
           
            
        </form> 
    </div>
</div>
    <div><br/><br/><br/><br/></div>
  
<?php include 'footer.php'; ?>
</body>

</html>
<script>    
    $(document).keypress(function(e) {
        if(e.which == 13){
        $('[name=confirmar]').click();            
        $("#quantidade").val("1");
        $("#busca").val("");
        $("#precoproduto").val("");
        $("#totalproduto").val("");
       
        }
         
    });

    var cadastro = "venda";
    
    
    
    
    
    var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
    
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
    
    $(document).ready(function(){
        var tt = $("#idcli").val();
        $("#idfuncionario").val(tt);
        
    });
		
	$(function(){
		$('#vendas').submit(function(event){
			event.preventDefault();
			var formDados = new FormData($(this)[0]);
			var resultado;
			$.ajax({
				url:'../funcoes/cadorcamento.php',
				type:'POST',
				data:formDados,
				cache:false,
				contentType:false,
				processData:false,
				success:function (data)
				{
					//$("#res_server").html(data);
					console.log(data);
					//alert("Pedido cadastrado com sucesso");
                    $(document).ready(function (){
                    $.ajax({
                    method: 'post',
                    url: 'sys/sys.php',
                    data: {remove_todos_produtos: 'sim'},
                    dataType: 'json',
                    success: function(retorno){                
                        $('tbody#content_retorno').html(retorno.dados);
                        $('div#cancela_pedido').html('<a ><i ></i></a>');
                    }
                    });
	}); 
				},
				dataType:'html'
			});
			return false;
		});
	});
	
	$(document).ready(function (){
		$.ajax({
		method: 'post',
		url: 'sys/sys.php',
		data: {remove_todos_produtos: 'sim'},
		dataType: 'json',
		success: function(retorno){                
			$('tbody#content_retorno').html(retorno.dados);
			$('div#cancela_pedido').html('<a ><i ></i></a>');
		}
		});
	});   
  
</script>



<?php
    mysqli_close($conecta);
?>