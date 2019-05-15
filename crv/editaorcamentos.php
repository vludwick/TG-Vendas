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
</head>

<body>
 
<div class="py-5 text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="pb-3 text-secondary">Alterar Orçamento</h1>
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
                        if(isset($_GET["id"])){
                            $idpedido = $_GET["id"];
                        }

                        $total = 0;
                        $qtdProdutosPedidos = 0;
						$idProdutos = array(); // Array que armazena todos os IDs dos produtos que estão no Pedido (para conseguir referenciar o name do input pra pegar os dados)
						session_start();
                        $_SESSION["ids"] = $idProdutos;
						$_SESSION["idpedido"] = $idpedido;
						$_SESSION["qtdProdutosPedidos"] = $qtdProdutosPedidos;


                        if(isset($_SESSION['carrinho'])){
                            unset($_SESSION['carrinho']);
                        }

                        $query="SELECT * FROM `pedido_produto` WHERE `id_pedido` = $idpedido";
                        $resultado = mysqli_query($conecta, $query);
                        while($linha = mysqli_fetch_array($resultado)){

                            $idproduto =    $linha['id_produto'];
                            $qtd =          $linha['quantidade'];
                            $descricao =    $linha['descricao'];
                            $preco =        $linha['preco'];
                            $subTotal =     $linha['valor_total'];
                            $total +=       $subTotal;
                            //print_r($linha);
                        
                            $consulta = mysqli_query($conecta, "SELECT nome FROM PRODUTO WHERE ID_PRODUTO ='$idproduto'");
                            $resultado1 = mysqli_fetch_array($consulta);
                            $nomeProduto = $resultado1['nome'];      

                            echo '<tr><td>'.utf8_encode($nomeProduto).'</td><td>'.number_format($preco, 2, ',', '.').'</td><td><input type="text" id="qtd" style="text-align: center;" disabled value="'.$qtd.'" size="3"  /></td>';
                            echo '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="cursor: pointer;width:50%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idproduto.'" >Delete</a></div></td></tr>';			
                            // INPUTS HIDDEN
                            echo '<tr><td><input type="hidden" id="" name="'.$idproduto.'id" value="'.$idproduto.'"></td>';
                            echo '<td><input type="hidden" id="" name="'.$idproduto.'preco" value="'.$preco.'"></td>';
                            echo '<td><input type="hidden" id="" name="'.$idproduto.'qtd" value="'.$qtd.'"></td>';
                            echo '<td><input type="hidden" id="" name="'.$idproduto.'subtotal" value="'.$subTotal.'"></td></tr>';	
                            
                            if(isset($_SESSION['carrinho'][$idproduto])){
                                $_SESSION['carrinho'][$idproduto] += $qtd;
                            }else{
                                $_SESSION['carrinho'][$idproduto] = $qtd;
							}	
							$_SESSION["qtdProdutosPedidos"]++;
							$_SESSION["ids"][$_SESSION["qtdProdutosPedidos"]] = $idproduto;	
							
                        }

						echo '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
						echo '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar</button></td></tr>';
                        // HIDDEN
                        echo '<td><input type="hidden" id="" name="total" value="'.$total.'"></td>';
						echo '<td><input type="hidden" id="" name="idpedido" value="'.$idpedido.'"></td>';
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
				url:'../funcoes/editaorcamento.php',
				type:'POST',
				data:formDados,
				cache:false,
				contentType:false,
				processData:false,
				success:function (data)
				{
					//console.log(data);
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
					$("#res_server").html(data);
				},
				dataType:'html'
			});
			return false;
		});
	});

</script>



<?php
    mysqli_close($conecta);
?>