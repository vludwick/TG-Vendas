<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../crv/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
					<title>Nota Fiscal</title>
					<link href="../crv/css/personalizado.css" rel="stylesheet">
				</head>
                    <table  width=780>
                        <thead>
                            <tr><th colspan="9" rowspan="2" style="text-align: center;">NOTA FISCAL</th></tr>
                        </thead>
                        
                        <tbody>
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
                                <td colspan="5"> Coca-Cola do Brasil</td>
                                <td colspan="3"> 00.555.666/0001-23 </td>
                                <td colspan="1"> 10/05/2019</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"> Endereço: </td>
                                <td colspan="3"> Bairro:</td>
                                <td colspan="1"> CEP:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"> Rua Antonio Vargas</td>
                                <td colspan="3"> Jardim Fatecanos </td>
                                <td colspan="1"> 18.116-390</td>
                                
                            </tr>
                            <tr>
                                <td colspan="6"> Cidade: </td>
                                <td colspan="1"> Estado:</td>
                                <td colspan="2"> RG/Inscrição Estadual:</td>
                                
                            </tr>
                            <tr>
                                <td colspan="6"> Sorocaba </td>
                                <td colspan="1"> São Paulo </td>
                                <td colspan="2"> 772.665.190.113 </td>
                                
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
                            <tr>                            
                                <td colspan="1" style="text-align: center"> 2 </td>
                                <td colspan="5"> Faixa elástica San Agostino </td>
                                <td colspan="1" style="text-align: center"> 2 </td>
                                <td colspan="1" style="text-align: center"> R$ 12,00 </td>
                                <td colspan="1" style="text-align: center"> R$ 24,00 </td>             
                            </tr>
                            <tr>                            
                                <td colspan="1" style="text-align: center"> 9 </td>
                                <td colspan="5"> Protetor bucal transparente </td>
                                <td colspan="1" style="text-align: center"> 2 </td>
                                <td colspan="1" style="text-align: center"> R$ 21,50 </td>
                                <td colspan="1" style="text-align: center"> R$ 43,00 </td>             
                            </tr>
                            <tr>                            
                                <td colspan="1" style="text-align: center"> 15 </td>
                                <td colspan="5"> Saco de areia 210kg Rudel </td> 
                                <td colspan="1" style="text-align: center"> 1 </td>
                                <td colspan="1" style="text-align: center"> R$ 620,00 </td>
                                <td colspan="1" style="text-align: center"> R$ 620,00 </td>             
                            </tr>
                            <tr>                            
                                <td colspan="1" style="text-align: center"> 25 </td>
                                <td colspan="5"> Luva de Boxe Balboa </td>
                                <td colspan="1" style="text-align: center"> 3 </td>
                                <td colspan="1" style="text-align: center"> R$ 25,00 </td>
                                <td colspan="1" style="text-align: center"> R$ 75,00 </td>                                
                            </tr>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" rowspan="2">Valor total da nota:</td>
                                <td colspan="2" rowspan="2" style="text-align: center;font-weight: bold;">R$ 762,00</td>
                            </tr>
                        </tfoot>
                    </table>

					
				<body>
			</html>
		');

	
	$dompdf->setPaper('A4', 'landscape');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>