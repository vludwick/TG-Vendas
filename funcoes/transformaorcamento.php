<?php
include 'conexao.php';
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$idpedido = $_POST["idpedido"];

// Alterando o tipo do Pedido para 1 (Venda Realizada)
$update="UPDATE `pedido` SET `tipo`= '1' WHERE id_pedido = '$idpedido'";
$resultado = mysqli_query($conecta, $update);

echo "<script>setTimeout(function(){ window.location = '../crv/pedidos.php'; }, 200);</script>";
mysqli_close($conecta);
?>