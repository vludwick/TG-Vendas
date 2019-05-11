<?php
include 'conexao.php';
session_start();

error_reporting(0);

$arrayIDS = array();
$acao				= $_POST["acao"];
$id			= $_POST["id"];
$arrayIDS 			= $_SESSION["ids"];
$qtdProdutosPedidos = $_POST['qtdProdutosPedidos'];
$totalPedido  		= $_POST['total'];
$idcliente 			= $_POST['idcliente'];
$idfuncionario 		= $_POST["idfuncionario"];

if($acao == "read"){
	$query = "select * from Pedido where id_pedido = $id";
	$consulta = mysqli_query($conecta, $query);
	$resultado = mysqli_fetch_array($consulta);
	$tabela = "<table class='table table-hover table-striped table-bordered' id='itens'>
	<thead>
		<tr>
			<th>Id</th>
			<th>Descricao</th>
			<th>Preco</th>
			<th>Quantidade</th>
			<th>Total</th>
		</tr>   
	</thead>
	<tbody>";


	
	

	$query = "select * from pedido_produto where id_pedido = $id";
	$consulta = mysqli_query($conecta, $query);
	while($resultado = mysqli_fetch_array($consulta)){
		$tabela = $tabela.'<tr id='.$resultado['id_produto'].'><td id="produto">'.$resultado['id_produto'].'</td>';
		$tabela = $tabela.'<td id="descricao">'.$resultado['descricao'].'</td>';
		$tabela = $tabela.'<td id="preco">'.$resultado['preco'].'</td>';
		$tabela = $tabela.'<td id="quantidade">'.$resultado['quantidade'].'</td>';
		$tabela = $tabela.'<td id="valor_total">'.$resultado['valor_total'].'</td></tr>';
	}

	$tabela = $tabela."</tbody>
	</table>";

	//print_r(array("select_produto"=>$query, "resultado"=>$resultado,"table"=>$tabela));
	echo $tabela;
	exit;
}

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






