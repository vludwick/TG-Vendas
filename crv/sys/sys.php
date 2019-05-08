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
				$retorno['dados1'] .= '<input  type="form-control" class="form-control" name="id_cliente" id="id_cliente" value="'.utf8_encode($conteudo->id_cliente).'" disabled>';
			
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
                
            }
            $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
            $retorno['dados'] .= '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar Pedido</button></td></tr>'; 
            
            
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
            $total = 0;
            foreach($_SESSION['carrinho'] as $idProd => $qtd){
                $pegaProduto = $pdo->prepare("SELECT * FROM `produto` WHERE `id_produto` = ?");
                $pegaProduto->execute(array($idProd));
                $dadosProduto = $pegaProduto->fetchObject();
                $subTotal = ($dadosProduto->preco*$qtd);
                $total += $subTotal;

                $retorno['dados'] .= '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.$dadosProduto->preco.'</td><td><input type="text" id="qtd" style="text-align: center;" disabled value="'.$qtd.'" size="3" /></td>';
                $retorno['dados'] .= '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="cursor: pointer;width:50%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';
                
            }
            if($total > 0){
                $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td>';
                $retorno['dados'] .= '<td id="total"><button type="submit" class="form-control" id="enviarvenda" style="cursor: pointer;width:60%;border-color:#007bff;background:#007bff;font:16px;color:white;text-align: center; margin-left: 45px;">Finalizar Pedido</button></td></tr>'; 
                
                
            
                
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
            


            echo json_encode($retorno);
	   }
        
    
?>