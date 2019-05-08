<?php
include 'conexao.php';
session_start();

$arrayIDS = array();
$arrayIDS 				= $_SESSION["ids"];
$qtdProdutosPedidos 	= $_SESSION["qtdProdutosPedidos"];
$totalPedido  			= $_POST['total'];
//$idcliente 			= $_POST['id_cliente'];
//$idfuncionario 		= $_POST["idfuncionario"];
$idcliente 	= '1';
$idfuncionario = '1';

//$len = sizeof($_SESSION['ids']);
//echo $len;
//echo $idfuncionario;
print_r($arrayIDS);
echo $qtdProdutosPedidos;
exit;

// Inserindo os dados na tabela PEDIDO 
$data = new DateTime();
$data = $data->format('d-m-Y H:i:s');

$insert = mysqli_query($conecta, "INSERT INTO PEDIDO (DATA_PEDIDO, TOTAL_PEDIDO, ID_CLIENTE, ID_FUNCIONARIO, TIPO)
VALUES ('$data', '$totalPedido', '$idcliente', '$idfuncionario', '1')");

// Buscando o ID do Pedido para usar na tabela Pedido_Produto
$consulta = mysqli_query($conecta, "SELECT ID_PEDIDO FROM PEDIDO WHERE DATA_PEDIDO ='$data'");
$resultado =  mysqli_fetch_array($consulta);
$idPedido = $resultado['ID_PEDIDO'];

// Inserindo os dados de cada produto na tabela pedido_produto
for($i = 1; $i <= $qtdProdutosPedidos; $i++){
	// Pegando o ID do primeiro produto do pedido através da array de IDS.
	$idProduto = $arrayIDS[$i];
	// Buscando o preço deste produto no input.
	$NamePreco = $idProduto.'preco';
	$precoProduto = $_POST[$NamePreco];
	// Buscando a quantidade deste produto no input.
	$NameQtd = $idProduto.'qtd';
	$QtdProduto = $_POST[$NameQtd];	
	// Buscando o subtotal deste produto no input.
	$NameSubTotal = $idProduto.'subtotal';
	$SubTotalProduto = $_POST[$NameSubTotal];		
	
	$insert2 = mysqli_query($conecta, "INSERT INTO PEDIDO_PRODUTO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE, PRECO, VALOR_TOTAL)
	VALUES ('$idPedido', '$idProduto', '$QtdProduto', '$precoProduto', '$SubTotalProduto')");
}

echo '<div class="alert alert-success" role="alert">Pedido cadastrado com sucesso</div>';
mysqli_close($conecta);
?>






