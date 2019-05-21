<?php
include 'conexao.php';
include 'valida.php';
include 'sobearquivo.php';

error_reporting(0);

$operacao 		= $_POST['operacao'];
$nome			= utf8_decode($_POST['nome']);
$preco 			= (double) str_replace(",", ".", $_POST['preco']);
$descricao 		= utf8_decode($_POST['descricao']);
$quantidade 	= $_POST['quantidade'];
$foto			= $_FILES['foto'];
$id  			= $_POST['id'];
$acao 			= $_POST['acao'];
$pk 			= $_POST['pk'];

$codbarras = date('d/m/Y às H:i:s');
$codbarras = md5($codbarras);

if($operacao == 'cadastrar')
{

	$query = "select max(id_produto) as id from produto";

	$consulta = mysqli_query($conecta, $query);	

	$resultado = mysqli_fetch_array($consulta);

	$resultado['id'];

	if($foto["error"] == 0)
	{
		//$foto  = arruma_arquivo($foto,'foto', $resultado['id'] + 1);
		$foto = arruma_arquivo($foto, 'foto', null);
	}
	$insert = mysqli_query($conecta, "INSERT INTO PRODUTO (nome, preco, descricao, quantidade, codigo_barras, foto) 
	VALUES ('$nome', '$preco', '$descricao', '$quantidade', '$codbarras', '$foto')") or die (mysqli_error($conecta));
	

	$query = "select max(id_produto) as id from produto";

	$consulta = mysqli_query($conecta, $query);	

	$resultado = mysqli_fetch_array($consulta);

	$query = "select * from produto where id_produto = ".$resultado['id'];

	$consulta = mysqli_query($conecta, $query);	
	
	$resultado = mysqli_fetch_array($consulta);

	echo '<div class="alert alert-success" role="alert">Produto cadastrado com sucesso</div>';
	print_r(array("id"=>$resultado['id_produto'], "nome"=>utf8_encode($resultado[nome]), "descricao"=>utf8_encode($resultado[descricao]), "preco"=>$resultado[preco]));

	exit;
}

if($operacao == "editarfoto"){
	$query = "select * from produto where id_produto = $pk";

	$resultado = mysqli_query($conecta, $query);

	$linha = mysqli_fetch_array($resultado);

	//$foto = arruma_arquivo($foto,'foto', $pk);
	$foto = arruma_arquivo($foto, 'foto', $linha['foto']);

	$query = "update produto set foto = '$foto', nome = '$nome', preco = '$preco', descricao = '$descricao', quantidade = $quantidade 
	where id_produto = $pk";

	mysqli_query($conecta, $query);

	echo '<div class="alert alert-success" role="alert">Produto editado com sucesso</div>';
	
	print_r(array("foto_velha"=>$linha['foto'], "foto_nova"=>$foto, "query"=>$query, "pk"=>$pk, "nome"=>utf8_encode($nome), "descricao"=>utf8_encode($descricao), "preco"=>$preco));
}

if($operacao == "editar"){
	$query = "select * from cliente where id_cliente = $pk";

	$resultado = mysqli_query($conecta, $query);

	$linha = mysqli_fetch_array($resultado);

	$query = "update produto set nome = '$nome', preco = '$preco', descricao = '$descricao', quantidade = '$quantidade'
	where id_produto = $pk";

	mysqli_query($conecta, $query);

	echo '<div class="alert alert-success" role="alert">Produto editado com sucesso</div>';
	
	print_r(array("query"=>$query, "pk"=>$pk, "nome"=>utf8_encode($nome), "descricao"=>utf8_encode($descricao), "preco"=>$preco));
}

if($acao == 'read' or $acao == 'update'){
	$query = "select * from produto where id_produto = $id";

	$resultado = mysqli_query($conecta, $query);

	$linha = mysqli_fetch_array($resultado);

	print_r(array("acao"=>$acao, "id"=>$linha["id_produto"], "nome"=>$linha["nome"], "preco"=>$linha["preco"], "descricao"=>$linha["descricao"], "quantidade"=>$linha["quantidade"], "foto"=>$linha["foto"]));
	exit;
}
mysqli_close($conecta);

?>






