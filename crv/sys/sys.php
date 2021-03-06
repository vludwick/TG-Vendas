<?php
session_start();
	if(isset($_POST['busca']) && $_POST['busca'] == 'sim'){
		include_once "../../funcoes/conexao.php";
		$textoBusca = strip_tags($_POST['texto']);
        $quantidade = strip_tags($_POST['qtdd']);
		$buscar = $pdo->prepare("SELECT * FROM `produto` WHERE `id_produto` = '$textoBusca' or `codigo_barras` = '$textoBusca'");
		$buscar->execute();

		$retorno = array();
		$retorno['dados'] = '';
		$retorno['dados1'] = '';
		$retorno['dados2'] = '';
		$retorno['qtd'] = $buscar->rowCount();
        
		if($retorno['qtd'] >= 0){
			while($conteudo = $buscar->fetchObject()){
                $total = $quantidade * $conteudo->preco;
				$retorno['dados'] .= '<a type="form-control" class="form-control" style="cursor: pointer;width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="'.$conteudo->id_produto.':'.$conteudo->preco.'">'.utf8_encode($conteudo->nome).'</a>';
                
                $retorno['dados1'] .= '<input type="form-control" class="form-control" name="precoproduto" disabled id="'.$conteudo->id_produto.':'.$conteudo->preco.'" value=" '. utf8_encode($conteudo->preco) . '">';
                
                $retorno['dados2'] .= '<input type="form-control" class="form-control" name="totalproduto" disabled id="'.$conteudo->id_produto.':'.$conteudo->preco.'" value=" '. $total . '">';
			}
		}

		echo json_encode($retorno);
	}

    if(isset($_POST['buscaCliente']) && $_POST['buscaCliente'] == 'sim'){
		include_once "../../funcoes/conexao.php";
		$textoBusca = strip_tags($_POST['textoCliente']);
		$buscar = $pdo->prepare("SELECT * FROM `cliente` WHERE `cpf` = '$textoBusca' or `cnpj` = '$textoBusca'");
		$buscar->execute();

		$retorno = array();
		$retorno['dados'] = '';
		$retorno['dados1'] = '';
		$retorno['qtd'] = $buscar->rowCount();
        
		if($retorno['qtd'] >= 0){
			while($conteudo = $buscar->fetchObject()){
				$retorno['dados'] .= '<input id="'.$conteudo->id_cliente.'" name="idcliente" type="form-control" class="form-control" value="'.utf8_encode($conteudo->nome).'" disabled>';
				$retorno['dados1'] .= '<input  type="hidden" class="form-control" name="id_cliente" id="id_cliente" value="'.utf8_encode($conteudo->id_cliente).'">';
			
            } 
		}

		echo json_encode($retorno);
	}

    if(isset($_POST['add_produto'])){
		include_once "../../funcoes/conexao.php";
		$retorno = array();
		$retorno['dados'] = '';
		

		$produtoId = (int)$_POST['produto'];
		$produtoQtd = (int)$_POST['qtdd'];
        if($produtoId != '')
        {
            if(isset($_SESSION['carrinho'][$produtoId])){
                $_SESSION['carrinho'][$produtoId] += $produtoQtd;
            }else{
                $_SESSION['carrinho'][$produtoId] = $produtoQtd;
            }
            $total = 0;
            foreach($_SESSION['carrinho'] as $idProd => $qtd){
                $pegaProduto = $pdo->prepare("SELECT * FROM `produto` WHERE `id_produto` = ?");
                $pegaProduto->execute(array($idProd));
                $dadosProduto = $pegaProduto->fetchObject();
                $subTotal = ($dadosProduto->preco*$qtd);
                $total += $subTotal;

                $retorno['dados'] .= '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.$dadosProduto->preco.'</td><td><input type="text" id="qtd" style="text-align: center;" disabled value="'.$qtd.'" size="3" /></td>';
                $retorno['dados'] .= '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="cursor: pointer;width:50%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';
                $retorno['dados'] .= '<tr><td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'id" value="'.$dadosProduto->id_produto.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'preco" value="'.$dadosProduto->preco.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'qtd" value="'.$qtd.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'descricao" value="'.$dadosProduto->descricao.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'subtotal" value="'.$subTotal.'"></td></tr>';	

			}
				
				if(array_search($dadosProduto->id_produto, $_SESSION["ids"]) == 0 || array_search($dadosProduto->id_produto, $_SESSION["ids"])== FALSE || array_search($dadosProduto->id_produto, $_SESSION["ids"]) == "" ){
					$_SESSION["qtdProdutosPedidos"]++;
					$_SESSION["ids"][$_SESSION["qtdProdutosPedidos"]] = $dadosProduto->id_produto;						
				}
            $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
            $retorno['dados'] .= '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar</button></td></tr>'; 
			$retorno['dados'] .= '<td><input type="hidden" id="" name="total" value="'.$total.'"></td>';
            
            
            echo json_encode($retorno);
	   }
    }

    if(isset($_POST['remove_produto'])){
		include_once "../../funcoes/conexao.php";
		$retorno = array();
		$retorno['dados'] = '';
		$retorno['tot'] = '';
		

		$produtoId = (int)$_POST['ID'];

        if($produtoId != '')
        {
            if(isset($_SESSION['carrinho'][$produtoId])){
                unset($_SESSION['carrinho'][$produtoId]);
            }
			
			$qtdExcluidos = 0;
			$len = sizeof($_SESSION['ids']);
			for($i = 1; $i <= $len; $i++){
				if($_SESSION['ids'][$i] == $produtoId){	
					$_SESSION['ids'][$i] = 0;
					$qtdExcluidos++;
				}
			}
			$NovoIDS = array();
			$j = 1;
			for($i = 1; $i <= $len; $i++){
				if($_SESSION['ids'][$i] != 0){
					$NovoIDS[$j] = $_SESSION['ids'][$i];
					$j++;
				}
			}
			$_SESSION['ids'] = $NovoIDS;
			$_SESSION["qtdProdutosPedidos"] = $_SESSION["qtdProdutosPedidos"] - $qtdExcluidos;
				
            $total = 0;
            foreach($_SESSION['carrinho'] as $idProd => $qtd){
                $pegaProduto = $pdo->prepare("SELECT * FROM `produto` WHERE `id_produto` = ?");
                $pegaProduto->execute(array($idProd));
                $dadosProduto = $pegaProduto->fetchObject();
                $subTotal = ($dadosProduto->preco*$qtd);
                $total += $subTotal;

                $retorno['dados'] .= '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.$dadosProduto->preco.'</td><td><input type="text" id="qtd" style="text-align: center;" disabled value="'.$qtd.'" size="3" /></td>';
                $retorno['dados'] .= '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="cursor: pointer;width:50%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';
                $retorno['dados'] .= '<tr><td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'id" value="'.$dadosProduto->id_produto.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'preco" value="'.$dadosProduto->preco.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'qtd" value="'.$qtd.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'descricao" value="'.$dadosProduto->descricao.'"></td>';
				$retorno['dados'] .= '<td><input type="hidden" id="" name="'.$dadosProduto->id_produto.'subtotal" value="'.$subTotal.'"></td></tr>';	
				                
            }
            if($total > 0){
                $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
                $retorno['dados'] .= '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="cursor: pointer;width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar</button></td></tr>'; 
                $retorno['dados'] .= '<td><input type="hidden" id="" name="total" value="'.$total.'"></td>';
 
            }
            $retorno['tot'] = $total;
            echo json_encode($retorno);
	   }
        
    }
	
	if(isset($_POST['remove_todos_produtos'])){
		include_once "../../funcoes/conexao.php";
		$retorno = array();
		$retorno['dados'] = '';
		
		
        if(isset($_SESSION['carrinho'])){
            unset($_SESSION['carrinho']);
        }
		$ArrayVazia = array(); 
		$_SESSION['ids'] = $ArrayVazia;
		$_SESSION["qtdProdutosPedidos"] = 0;
		
		echo json_encode($retorno);
	}

    if(isset($_POST['Ano']) && $_POST['faturamento'] == 'sim'){
		include_once "../../funcoes/conexao.php";
		$Ano = strip_tags($_POST['Ano']);

		$retorno = array();
		$retorno['dados'] = '';
		
        $query=
            "SELECT 
                sum(total_pedido)as totalmes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', -2), '-', 1) AS mes, 
                SUBSTRING_INDEX(SUBSTRING_INDEX(data_pedido, ' ', 1), '-', 1) AS ano,
                count(data_pedido) as quantidade
            from pedido 
            where tipo = 1
            group by mes, ano";
        
            $resultado = mysqli_query($conecta, $query);
            $totalano = 0;
            $vendasAno = 0;
            while($linha = mysqli_fetch_array($resultado)){
                if(utf8_encode($linha['ano']) == $Ano){
                    switch ($linha['mes']) {
                    case 1: $mees = 'Janeiro'; break;
                    case 2: $mees = 'Fevereiro'; break;
                    case 3: $mees = 'Mar&ccedilo'; break;
                    case 4: $mees = 'Abril'; break;
                    case 5: $mees = 'Maio'; break;
                    case 6: $mees = 'Junho'; break;
                    case 7: $mees = 'Julho'; break;
                    case 8: $mees = 'Agosto'; break;
                    case 9: $mees = 'Setembro'; break;
                    case 10: $mees = 'Outubro'; break;
                    case 11: $mees = 'Novembro'; break;
                    case 12: $mees = 'Dezembro'; break;
                }
                    $retorno['dados'] .= 
                        'echo <tr id='.$linha["mes"].'><td>'.utf8_encode($mees).'</td>';
                    $retorno['dados'] .= 
                        'echo <td>'.utf8_encode($linha["ano"]).'</td>';
                    $number = number_format($linha["totalmes"], 2, ',', '.');
                    $retorno['dados'] .= 
                        'echo <td>R$ '.utf8_encode($number).'</td>';
                    $retorno['dados'] .= '<td>'.$linha["quantidade"].'</td></tr>';
                    $totalano = $totalano + $linha['totalmes'];
                    $vendasAno = $vendasAno + $linha['quantidade'];
                }
            }
        
            $retorno['dados'] .= '<tr><td colspan="2">Total do ano:</td>';
            $retorno['dados'] .= '<td>R$ '.number_format($totalano, 2, ',', '.').'</td>';
            $retorno['dados'] .= '<td>'.$vendasAno.'</td></tr>';

		echo json_encode($retorno);
    }
?>