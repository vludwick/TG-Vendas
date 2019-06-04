<?php
include 'conexao.php';
session_start();

$arrayIDS = array();
$acao					= $_POST["acao"];
$id						= $_POST["id"];
$arrayIDS 				= $_SESSION["ids"];
$qtdProdutosPedidos 	= $_SESSION["qtdProdutosPedidos"];
$totalPedido  			= $_POST['total'];
$idcliente 				= $_SESSION['idcliente'];
$idfuncionario 			= $_POST["idfuncionario"];
$_SESSION["totalnota"] = $_POST['total'];

if($_SESSION['idcliente'] == '' || $_SESSION['idcliente'] == NULL){
	$idcliente = "1";
}

$_SESSION["idfuncionario"] = $_POST['idfuncionario'];



if($acao == "read"){
    $query1 = "select tipo from pedido where id_pedido = $id";
	$consulta1 = mysqli_query($conecta, $query1);
    $_SESSION["idpedido"] = $consulta1;

    
	$query =	"SELECT p.data_pedido, p.total_pedido, c.nome as nome_cliente, f.nome as nome_funcionario FROM
                  pedido p inner join cliente c 
                  inner join funcionario f 
                  ON
                  p.id_cliente = c.id_cliente and p.id_funcionario = f.id_funcionario 
                  WHERE p.id_pedido = $id";
    
	$consulta = mysqli_query($conecta, $query);
	$resultado = mysqli_fetch_array($consulta);
	$data = $resultado['data_pedido'];
	$total_pedido = $resultado['total_pedido'];
	$cliente = utf8_encode($resultado['nome_cliente']);
	$funcionario = utf8_encode($resultado['nome_funcionario']);
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
	
	$query1 = "select * from pedido where id_pedido = $id";
	$consulta1 = mysqli_query($conecta, $query1);
    //$tipo = $consulta1['tipo'];
    while($resultado1 = mysqli_fetch_array($consulta1)){
		$tipo = $resultado1['tipo'];
	}
    if($tipo == 1){
        $tipoconsulta = 'Consulta de pedido';
        $btncupom = '<a class="btn btn-primary" style="cursor: pointer; color:white" href="../funcoes/cupom2.php?id1='.$id.'" target="_blank"> Cupom fiscal</a>';
    }else
    {
        $tipoconsulta = 'Consulta de orçamento';
        $btncupom = " ";
    }
    
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
	print_r(array("tipoconsulta"=>$tipoconsulta, "btncupom"=>$btncupom, "data"=>$data, "total"=>$total_pedido, "cliente"=>$cliente, "funcionario"=>$funcionario, "table"=>$tabela));
	
	exit;
}

$krr    = explode(' ', $data);
$_SESSION["datanf"] = $krr[0];
$_SESSION['nfprods'] = '';
// Inserindo os dados na tabela PEDIDO 
$insert = mysqli_query($conecta, "INSERT INTO PEDIDO (DATA_PEDIDO, TOTAL_PEDIDO, ID_CLIENTE, ID_FUNCIONARIO, TIPO)
VALUES (now(), '$totalPedido', '$idcliente', '$idfuncionario', '1')");

// Buscando o ID do Pedido para usar na tabela Pedido_Produto
$consulta = mysqli_query($conecta, "SELECT MAX(ID_PEDIDO) as id_pedido FROM PEDIDO");
$resultado = mysqli_fetch_array($consulta);
$idPedido = $resultado['id_pedido'];

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

	// Diminuindo a quantidade em estoque do produto
	$consulta = mysqli_query($conecta, "SELECT quantidade FROM produto where id_produto = '$idProduto'");
	$resultado = mysqli_fetch_array($consulta);
	$qtd = $resultado['quantidade'];
    $novaQtd = $qtd - $QtdProduto;
	$updateQTD = mysqli_query($conecta, "UPDATE `produto` SET `quantidade`='$novaQtd' WHERE id_produto = '$idProduto'");
    
    $_SESSION['nfprods'] .= '<tr><td colspan="1" style="text-align: center"> '.$idProduto.' </td><td colspan="5"> '.$DescricaoProduto.' </td><td colspan="1" style="text-align: center"> '.$QtdProduto.' </td><td colspan="1" style="text-align: center"> R$ '.$precoProduto.' </td><td colspan="1" style="text-align: center"> R$ '.$SubTotalProduto.' </td></tr>';
}

echo '<div class="alert alert-success" role="alert">Pedido cadastrado com sucesso</div>';
mysqli_close($conecta);
?>






