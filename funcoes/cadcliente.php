<?php
include 'conexao.php';
include 'valida.php';


$acao       = $_POST['acao'];
$id			= $_POST['id'];
$operacao   = $_POST['operacao'];
$select 		= $_POST['options'];
$nome	 		= utf8_decode($_POST['nome']);
$cpf 			= $_POST['cpf'];
$rg 			= $_POST['rg'];
$datanasc 		= $_POST['datanasc'];
$nomefantasia 	= utf8_decode($_POST['nomefantasia']);
$cnpj 			= $_POST['cnpj'];
$inscricao 		= $_POST['inscricao'];
$email 			= $_POST['email'];
$rua 			= utf8_decode($_POST['rua']);
$numero 		= $_POST['numero'];
$bairro 		= utf8_decode($_POST['bairro']);
$cidade 		= utf8_decode($_POST['cidade']);
$estado			= utf8_decode($_POST['estado']);
$cep	 		= $_POST['cep'];
$telefone 		= $_POST['telefone'];
$celular 		= $_POST['celular'];
$pk				= $_POST['pk'];


if($operacao == 'cadastrar' && validaCPF($cpf) == false && $cnpj == '')
{
	echo '<div class="alert alert-danger" role="alert">CPF Inválido</div>';
	exit;
}

if($operacao == 'cadastrar' && validaCNPJ($cnpj) == false && $cpf == '')
{
	echo '<div class="alert alert-danger" role="alert">CNPJ Inválido</div>';
	exit;
}

if($operacao == 'cadastrar' && $select == '1')
{
	$query = "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cpf, rg, data_nascimento) 
	VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cpf', '$rg', '$datanasc')";
	mysqli_query($conecta, $query);	
		
	echo '<div class="alert alert-success" role="alert">Cliente Físico cadastrado com sucesso</div>';
	
	/*
	print_r(array("ordem"=>1, "operacao"=>$operacao, "options"=>$select,
	"nome"=>$nome, "cpf"=>$cpf, "rg"=>$rg, "datanasc"=>$datanasc, 
	"nomefantasia"=>$nomefantasia, "cnpj"=>$cnpj, "inscricao"=>$inscricao, 
	"email"=>$email, "rua"=>$rua, "numero"=>$numero, "bairro"=>$bairro, 
	"cidade"=>$cidade, "estado"=>$estado, "cep"=>$cep, "telefone"=>$telefone, 
	"celular"=>$celular, "query"=>$query));
	*/
	
	exit;
}

if($operacao == 'cadastrar' && $select == '2')
{	$query = "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cnpj, inscricao_estadual, nome_fantasia) 
	VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cnpj', '$inscricao', '$nomefantasia')";
	mysqli_query($conecta, $query);	
	
    
	echo '<div class="alert alert-success" role="alert">Cliente Jurídico cadastrado com sucesso</div>';
	
	/*print_r(array("ordem"=>2, "operacao"=>$operacao, "options"=>$select,
	"nome"=>$nome, "cpf"=>$cpf, "rg"=>$rg, "datanasc"=>$datanasc, 
	"nomefantasia"=>$nomefantasia, "cnpj"=>$cnpj, "inscricao"=>$inscricao, 
	"email"=>$email, "rua"=>$rua, "numero"=>$numero, "bairro"=>$bairro, 
	"cidade"=>$cidade, "estado"=>$estado, "cep"=>$cep, "telefone"=>$telefone, 
	"celular"=>$celular, "query"=>$query));
	*/
	exit;
}

if($acao == "update" or $acao == "read"){
	$query = "select * from cliente where id_cliente = $id";

	$resultado = mysqli_query($conecta, $query);
	$linha = mysqli_fetch_array($resultado);
	
	print_r(array("acao"=>$acao, "id"=>$linha["id_cliente"], "nome"=>utf8_encode($linha["nome"]), "email"=>utf8_encode($linha["email"]), "logradouro"=>utf8_encode($linha["logradouro"]), "numero"=>$linha["numero"], "bairro"=>utf8_encode($linha["bairro"]),
	"cidade"=>utf8_encode($linha["cidade"]), "estado"=>utf8_encode($linha["estado"]), "cep"=>$linha["cep"], "telefone"=>$linha["telefone"], "celular"=>$linha["celular"], "cpf"=>$linha["cpf"], "rg"=>$linha["rg"],
	"datanasc"=>$linha["data_nascimento"], "cnpj"=>$linha["cnpj"], "inscricao"=>$linha["inscricao_estadual"], "nomefantasia"=>utf8_encode($linha["nome_fantasia"])));
	
	exit;
}



if($operacao == "editar"){
	$query = "select * from cliente where id_cliente = $pk";

	$resultado = mysqli_query($conecta, $query);
	$linha = mysqli_fetch_array($resultado);

	if(isset($linha['cpf'])){
		$query = "update cliente set nome = '$nome', rg = '$rg', email = '$email', logradouro = '$rua', 
		numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', 
		telefone = '$telefone', celular = '$celular' where id_cliente = $pk";
		mysqli_query($conecta, $query);
		echo '<div class="alert alert-success" role="alert">Cliente Físico editado com sucesso</div>';
	}else if(isset($linha['cnpj'])){
		$query = "update cliente set nome = '$nome', nome_fantasia = '$nomefantasia', email = '$email', logradouro = '$rua', 
		numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', 
		telefone = '$telefone', celular = '$celular' where id_cliente = $pk";
		mysqli_query($conecta, $query);
		echo '<div class="alert alert-success" role="alert">Cliente Jurídico editado com sucesso</div>';
	}
	
	/*
	print_r(array("pk"=>$pk, "ordem"=>4, "operacao"=>$operacao, "options"=>$select,
	"nome"=>$nome, "cpf"=>$cpf, "rg"=>$rg, "datanasc"=>$datanasc, 
	"nomefantasia"=>$nomefantasia, "cnpj"=>$cnpj, "inscricao"=>$inscricao, 
	"email"=>$email, "rua"=>$rua, "numero"=>$numero, "bairro"=>$bairro, 
	"cidade"=>$cidade, "estado"=>$estado, "cep"=>$cep, "telefone"=>$telefone, 
	"celular"=>$celular, "query"=>$query));
	*/
	exit;
}



//	print_r(array("acao"=>$acao, "id"=>$id, "query"=>$query));


if($acao == "delete"){

	$query = "delete from cliente where id_cliente = $id";
	mysqli_query($conecta, $query);
	/*
	print_r(array("ordem"=>5, "acao"=>$acao, "id"=>$id, "query"=>$query));
	*/
	exit;
}
mysqli_close($conecta);

?>






