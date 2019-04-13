<?php
include 'conexao.php';
include 'valida.php';

$id			= $_POST['id'];
$acao       = $_POST['acao'];

$query = "select * from cliente where id_cliente = $id";

$resultado = mysqli_query($conecta, $query);
$linha = mysqli_fetch_array($resultado);


print_r(array("acao"=>$acao, "nome"=>utf8_encode($linha["nome"]), "email"=>utf8_encode($linha["email"]), "logradouro"=>utf8_encode($linha["logradouro"]), "numero"=>$linha["numero"], "bairro"=>utf8_encode($linha["bairro"]),
"cidade"=>utf8_encode($linha["cidade"]), "estado"=>utf8_encode($linha["estado"]), "cep"=>$linha["cep"], "telefone"=>$linha["telefone"], "celular"=>$linha["celular"], "cpf"=>$linha["cpf"], "rg"=>$linha["rg"],
"datanasc"=>$linha["data_nascimento"], "cnpj"=>$linha["cnpj"], "inscricao"=>$linha["inscricao_estadual"], "nomefantasia"=>utf8_encode($linha["nome_fantasia"])));




/*
$id 			= $_POST['id'];
$acao 			= $_POST['acao'];
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

if(validaCPF($cpf) == false && $cnpj == '')
{
	echo '<div class="alert alert-danger" role="alert">CPF Inválido</div>';
	exit;
}

if(validaCNPJ($cnpj) == false && $cpf == '')
{
	echo '<div class="alert alert-danger" role="alert">CNPJ Inválido</div>';
	exit;
}

if($acao == 'incluir' && $select == '1')
{
	$insert = mysqli_query($conecta, "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cpf, rg, data_nascimento) 
	VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cpf', '$rg', '$datanasc')") or die (mysqli_error($conecta));	
		
	echo '<div class="alert alert-success" role="alert">Cliente Físico cadastrado com sucesso</div>';
}

if($acao == 'incluir' && $select == '2')
{
	$insert = mysqli_query($conecta, "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cnpj, inscricao_estadual, nome_fantasia) 
	VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cnpj', '$inscricao', '$nomefantasia')") or die (mysqli_error($conecta));	
	
    
	echo '<div class="alert alert-success" role="alert">Cliente Jurídico cadastrado com sucesso</div>';
}


*/
mysqli_close($conecta);

?>






