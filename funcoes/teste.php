<?php
include 'conexao.php';
include 'valida.php';

$id			= $_POST['id'];

$query = "select * from cliente where id_cliente = $id";

$resultado = mysqli_query($conecta, $query);
$linha = mysqli_fetch_array($resultado);

echo '<div class="alert alert-danger" role="alert">'.$linha["nome"].'</div>';
echo '<div class="alert alert-danger" role="alert">'.$id.'</div>';
exit;
