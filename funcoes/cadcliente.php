<?php
include 'conexao.php';
include 'valida.php';

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

if($nome == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite o nome</div>';
	exit;
}

if($datanasc == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite a Data de Nascimento</div>';
	exit;
}

if($cpf == '' && $cnpj == '')
{
	echo '<div class="alert alert-danger" role="alert">Digite o CPF ou CNPJ</div>';
	exit;
}

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

mysqli_close($conecta);

?>






