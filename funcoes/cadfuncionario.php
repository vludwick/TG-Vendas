<?php
include 'conexao.php';
include 'valida.php';

//error_reporting(0);

$id = $_POST['id'];
	
$query = "select * from cliente where id_cliente = $id";

$resultado = mysqli_query($conecta, $query);

$linha = mysqli_fetch_array($resultado);
	
print_r(array("nome"=>utf8_encode($linha["nome"]), "datanasc"=>$linha["data_nascimento"], "cpf"=>$linha["cpf"], "rg"=>$linha["rg"], "dataadm"=>$linha["data_admissao"], "logradouro"=>utf8_encode($linha["logradouro"]), "numero"=>$linha["numero"], "bairro"=>utf8_encode($linha["bairro"]),
	"cidade"=>utf8_encode($linha["cidade"]), "estado"=>utf8_encode($linha["estado"]), "cep"=>$linha["cep"],"email"=>$linha["email"], "telefone"=>$linha["telefone"], "celular"=>$linha["celular"], "tipo"=>$linha["tipo"]);
	
exit;

mysqli_close($conecta);

?>