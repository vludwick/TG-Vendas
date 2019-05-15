<?php
include 'conexao.php';
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$idpedido = $_POST["idpedido"];

// Excluindo os Itens da tabela Pedido_Produto, antes de cadastrar os novos itens.
$delete="DELETE FROM `pedido_produto` WHERE id_pedido = '$idpedido'";
$resultado = mysqli_query($conecta, $delete);
// Excluindo os Itens da tabela Pedido, antes de cadastrar os novos itens.
$delete2="DELETE FROM `pedido` WHERE id_pedido = '$idpedido'";
$resultado = mysqli_query($conecta, $delete2);

echo "<script>setTimeout(function(){ window.location = '../crv/pedidos.php'; }, 200);</script>";
mysqli_close($conecta);
?>






