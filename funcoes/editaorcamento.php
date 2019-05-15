<?php
include 'conexao.php';
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$arrayIDS = array();
$arrayIDS 				= $_SESSION["ids"];
$qtdProdutosPedidos 	= $_SESSION["qtdProdutosPedidos"];
$idpedido 				= $_SESSION["idpedido"];
$totalPedido  			= $_POST['total'];
$idcliente 				= $_POST['id_cliente'];
$idfuncionario 			= $_POST["idfuncionario"];

if($_POST['id_cliente'] == '' || $_POST['id_cliente'] == NULL){
	$idcliente = "1";
}

// Excluindo os Itens da tabela Pedido_Produto, antes de cadastrar os novos itens.
$delete="DELETE FROM `pedido_produto` WHERE id_pedido = '$idpedido'";
$resultado = mysqli_query($conecta, $delete);
// Excluindo os Itens da tabela Pedido, antes de cadastrar os novos itens.
$delete2="DELETE FROM `pedido` WHERE id_pedido = '$idpedido'";
$resultado = mysqli_query($conecta, $delete2);


// Inserindo os dados na tabela PEDIDO 
$data = new DateTime();
$data = $data->format('d-m-Y H:i:s');

$insert = mysqli_query($conecta, "INSERT INTO PEDIDO (DATA_PEDIDO, TOTAL_PEDIDO, ID_CLIENTE, ID_FUNCIONARIO, TIPO)
VALUES ('$data', '$totalPedido', '$idcliente', '$idfuncionario', '0')");

// Buscando o ID do Pedido para usar na tabela Pedido_Produto
$consulta = mysqli_query($conecta, "SELECT ID_PEDIDO FROM PEDIDO WHERE DATA_PEDIDO ='$data'");
$resultado = mysqli_fetch_array($consulta);
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
    // Buscando a descrição deste produto no input.
	$NameDescricao = $idProduto.'descricao';
	$DescricaoProduto = $_POST[$NameDescricao];
	// Buscando o subtotal deste produto no input.
	$NameSubTotal = $idProduto.'subtotal';
	$SubTotalProduto = $_POST[$NameSubTotal];		
	
    $insert2 = mysqli_query($conecta, "INSERT INTO PEDIDO_PRODUTO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE, DESCRICAO, PRECO, VALOR_TOTAL)
	VALUES ('$idPedido', '$idProduto', '$QtdProduto', '$DescricaoProduto', '$precoProduto', '$SubTotalProduto')");
}
echo "<script>setTimeout(function(){ window.location = '../crv/pedidos.php'; }, 1000);</script>";
mysqli_close($conecta);
?>






