<?php
include 'conexao.php';
include 'valida.php';

$id			= $_POST['id'];

$query = "select * from cliente where id_cliente = $id";

$resultado = mysqli_query($conecta, $query);
$linha = mysqli_fetch_array($resultado);

echo '<div>'.$id.'</div>';

exit;
