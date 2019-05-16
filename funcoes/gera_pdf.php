<?php	
include 'conexao.php';
session_start();

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../crv/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

    //Dados que serão inseridos na NOTA
    $nome = ' ';
    $cpfcnpj = ' ';
    $dataemissao = ' ';
    $endereco = ' ';
    $bairro = ' ';
    $cep = ' ';
    $cidade = ' ';
    $estado = ' ';
    $rginscricao = ' ';
    $totalnota = '';
    $produtos = '<tr><td colspan="1" style="text-align: center"> </td><td colspan="5"> </td><td colspan="1" style="text-align: center"> </td><td colspan="1" style="text-align: center">  </td><td colspan="1" style="text-align: center">  </td></tr>';
    
    
    if ( isset($_SESSION["totalnota"])){
        $totalnota = $_SESSION["totalnota"];
    }

    if ( isset($_SESSION['nfprods']) && $_SESSION['nfprods'] != ''){
        $produtos = $_SESSION['nfprods'];
    }

    if ( isset($_SESSION["datanf"])){
        $dataemissao = $_SESSION["datanf"];
    }

    if ( isset($_SESSION["idcliente"]) && $_SESSION["idcliente"] != ''){
        $id = $_SESSION["idcliente"];
        $query = "select * from cliente where id_cliente = $id";

	   $resultado = mysqli_query($conecta, $query);

	   $linha = mysqli_fetch_array($resultado);
        
        $nome = utf8_encode($linha["nome"]);
        $endereco = utf8_encode($linha["logradouro"]);
        $bairro = utf8_encode($linha["bairro"]);
        $cidade = utf8_encode($linha["cidade"]);
        $estado = utf8_encode($linha["estado"]);
        $cep = $linha["cep"];
        
        if($linha["cpf"] != ''  && $linha["cpf"] != NULL){       
           $cpfcnpj = $linha["cpf"];
        }else {
            $cpfcnpj = $linha["cnpj"];
        }
        
        if($linha["inscricao_estadual"] != ''  && $linha["inscricao_estadual"] != NULL){       
           $rginscricao = $linha["inscricao_estadual"];
        }else {
            $rginscricao = $linha["rg"];
        }
        
    }
    

    

	// Carrega seu HTML
	$dompdf->load_html('
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
                    <title>Cupom Fiscal</title>
					<link href="../crv/css/personalizado.css" rel="stylesheet">
				</head>
                    <table  width=530>
                        <thead>
                            
                        </thead>
                        
                        <tbody>
                            <tr><th colspan="9" rowspan="2" style="text-align: center;">CUPOM FISCAL</th></tr>
                            <tr>                                           
                            </tr>
                            <tr>
                                <td colspan="5"> Nome: </td>
                                <td colspan="3"> CNPJ:</td>
                                <td colspan="1"> Incrição Estadual:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"> CRV Sports</td>
                                <td colspan="3"> 00.456.569/0001-66 </td>
                                <td colspan="1"> 669.554.190.113</td>
                                
                            </tr>
                            <tr>
                                <td colspan="9" rowspan="2" style="font-weight: bold;"> DESTINATÁRIO/REMETENTE</td>
                                
                            </tr>
                            <tr>
                                                                
                            </tr>
                            <tr>
                                <td colspan="5"> Nome/Razão Social: </td>
                                <td colspan="3"> CPF/CNPJ:</td>
                                <td colspan="1"> Data Emissão:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5">'.$nome.'</td>
                                <td colspan="3"> '.$cpfcnpj.' </td>
                                <td colspan="1"> '.$dataemissao.'</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"> Endereço: </td>
                                <td colspan="3"> Bairro:</td>
                                <td colspan="1"> CEP:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"> '.$endereco.' </td>
                                <td colspan="3"> '.$bairro.' </td>
                                <td colspan="1"> '.$cep.' </td>
                                
                            </tr>
                            <tr>
                                <td colspan="6"> Cidade: </td>
                                <td colspan="1"> Estado:</td>
                                <td colspan="2"> RG/Inscrição Estadual:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="6"> '.$cidade.' </td>
                                <td colspan="1"> '.$estado.' </td>
                                <td colspan="2"> '.$rginscricao.' </td>
                                
                            </tr>
                            <tr>
                                <td colspan="1" rowspan="2" > Cod. Produto: </td>
                                <td colspan="5" rowspan="2"> Descrição: </td>
                                <td colspan="1" rowspan="2"> Quantidade: </td>
                                <td colspan="1" rowspan="2"> Valor unitário: </td>
                                <td colspan="1" rowspan="2"> Valor total: </td>
                                
                            </tr>
                            <tr>
                            </tr>
                           '.$produtos.'
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" rowspan="2">Valor total da nota:</td>
                                <td colspan="2" rowspan="2" style="text-align: center;font-weight: bold;">R$ '.$totalnota.'</td>
                            </tr>
                        </tfoot>
                    </table>

					
				<body>
			</html>
		');

    //Zerando tudo relacionado as vendas
    unset($_SESSION['idcliente']);
    unset($_SESSION['totalnota']);
    unset($_SESSION['datanf']);
    unset($_SESSION['nfprods']);
    

	$dompdf->setPaper('A4', 'portrait');
	
	//Renderizar o html
	$dompdf->render();
	
	//Exibibir a página
	$dompdf->stream(
		"cupom_fiscal.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

mysqli_close($conecta);
?>