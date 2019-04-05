<?php
include 'conexao.php';
include 'valida.php';
include 'sobearquivo.php';

$acao 			= $_POST['acao'];
$nome			= utf8_decode($_POST['nome']);
$preco 			= (double) str_replace(",", ".", $_POST['preco']);
$descricao 		= utf8_decode($_POST['descricao']);
$quantidade 	= $_POST['quantidade'];
$foto			= $_FILES['foto'];

$codbarras = date('d/m/Y às H:i:s');
$codbarras = md5($codbarras);

if($nome == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite o nome</div>';
	exit;
}

if($preco == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite o preço do produto</div>';
	exit;
}

if($quantidade == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite a Quantidade do Produto</div>';
	exit;
}


if($acao == 'incluir')
{
	error_reporting(0);
	if($foto["error"] == 0)
	{
		$foto  = arruma_arquivo($foto,'foto');
	}
	$insert = mysqli_query($conecta, "INSERT INTO PRODUTO (nome, preco, descricao, quantidade, codigo_barras, foto) 
	VALUES ('$nome', '$preco', '$descricao', '$quantidade', '$codbarras', '$foto')") or die (mysqli_error($conecta));	
		
	echo '<div class="alert alert-success" role="alert">Produto cadastrado com sucesso</div>';
}

mysqli_close($conecta);

?>






