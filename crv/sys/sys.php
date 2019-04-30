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
				$retorno['dados'] .= '<a type="form-control" class="form-control" style="width:60%;padding:6px;border:2px solid black;background:dodgerblue;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="'.$conteudo->id_produto.':'.$conteudo->preco.'">'.utf8_encode($conteudo->nome).'</a>';
                
                $retorno['dados1'] .= '<input type="form-control" class="form-control" name="precoproduto" disabled id="'.$conteudo->id_produto.':'.$conteudo->preco.'" value=" '. utf8_encode($conteudo->preco) . '">';
                
                $retorno['dados2'] .= '<input type="form-control" class="form-control" name="totalproduto" disabled id="'.$conteudo->id_produto.':'.$conteudo->preco.'" value=" '. $total . '">';
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

                $retorno['dados'] .= '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.$dadosProduto->preco.'</td><td><input type="text" id="qtd" value="'.$qtd.'" size="1" /></td>';
                $retorno['dados'] .= '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="width:50%;border:2px solid black;background:dodgerblue;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';
                
            }
            $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td></tr>';
            echo json_encode($retorno);
	   }
    }

    if(isset($_POST['remove_produto'])){
		include_once "../../funcoes/conexao.php";
		$retorno = array();
		$retorno['dados'] = '';

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

                $retorno['dados'] .= '<tr><td>'.utf8_encode($dadosProduto->nome).'</td><td>'.$dadosProduto->preco.'</td><td><input type="text" id="qtd" value="'.$qtd.'" size="1" /></td>';
                $retorno['dados'] .= '<td>R$ '.number_format($subTotal, 2, ',', '.').'</td><td><div id="remover"><a type="form-control" class="form-control" style="width:50%;border:2px solid black;background:dodgerblue;font:16px;color:white;text-align: center; margin-left: 60px;" id="'.$idProd.'" >Delete</a></div></td></tr>';
                
            }
            $retorno['dados'] .= '<tr><td colspan="3">Total</td><td id="total">R$ '.number_format($total, 2, ',','.').'</td></tr>';
            echo json_encode($retorno);
	   }
    }
?>