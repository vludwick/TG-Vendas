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




