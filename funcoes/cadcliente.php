<?php
include 'conexao.php';
include 'valida.php';

error_reporting(0);

//if(isset($_POST['acao'])){
	$acao       = $_POST['acao'];
	$id			= $_POST['id'];
//}
///if(isset($_POST['$operacao'])){
	$operacao   	= $_POST['operacao'];
	$select 		= $_POST['options'];
	$nome	 		= utf8_decode($_POST['nome']);
	$cpf 			= $_POST['cpf'];
	$rg 			= $_POST['rg'];
	$datanasc 		= $_POST['datanasc'];
	$nomefantasia 	= utf8_decode($_POST['nomefantasia']);
	$cnpj 			= $_POST['cnpj'];
	$inscricao 		= $_POST['inscricao'];
	$email 			= $_POST['email'];
	$rua 			= utf8_decode($_POST['rua']);
	$numero 		= $_POST['numero'];
	$bairro 		= utf8_decode($_POST['bairro']);
	$cidade 		= utf8_decode($_POST['cidade']);
	$estado			= utf8_decode($_POST['estado']);
	$cep	 		= $_POST['cep'];
	$telefone 		= $_POST['telefone'];
	$celular 		= $_POST['celular'];
	$pk				= $_POST['pk'];
//}


if($operacao == 'cadastrar' && validaCPF($cpf) == false && $cnpj == ''){
	echo '<div class="alert alert-danger" role="alert">CPF Inválido</div>';
	exit;
}

if($operacao == 'cadastrar' && validaCNPJ($cnpj) == false && $cpf == ''){
	echo '<div class="alert alert-danger" role="alert">CNPJ Inválido</div>';
	exit;
}

if($operacao == 'cadastrar' && $select == '1'){   
        $buscaCliente = "SELECT * ";
        $buscaCliente .= "FROM cliente ";
        $buscaCliente .= "WHERE cpf = '{$cpf}'";
                
        $acesso1 = mysqli_query($conecta, $buscaCliente);
        if ( !$acesso1 ){
            die("Falha na consulta ao banco");
        }
    
        $informacao1 = mysqli_fetch_assoc($acesso1);

        if ( empty($informacao1)) {
           $query = "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cpf, rg, data_nascimento) 
            VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cpf', '$rg', '$datanasc')";

            mysqli_query($conecta, $query);	

            $query = "select max(id_cliente) as id from cliente";

            $consulta = mysqli_query($conecta, $query);	

            $resultado = mysqli_fetch_array($consulta);

            $query = "select * from cliente where id_cliente = ".$resultado['id'];

            $consulta = mysqli_query($conecta, $query);	

            $resultado = mysqli_fetch_array($consulta);

			echo '<div class="alert alert-success" role="alert">Cliente Físico cadastrado com sucesso</div>';
			print_r(array("id"=>$resultado['id_cliente'], "nome"=>$resultado['nome']));
        } else{
          
			echo '<div class="alert alert-danger" role="alert">CPF já cadastrado</div>';
			print_r(array("erro"=>'erro'));
        }
        
	

	exit;
}

if($operacao == 'cadastrar' && $select == '2'){	
	$query = "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cnpj, inscricao_estadual, nome_fantasia) 
	VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cnpj', '$inscricao', '$nomefantasia')";
	
	mysqli_query($conecta, $query);	
	
	$query = "select max(id_cliente) as id from cliente";
    $buscaCliente = "SELECT * ";
    $buscaCliente .= "FROM cliente ";
    $buscaCliente .= "WHERE cnpj = '{$cnpj}'";

    $acesso1 = mysqli_query($conecta, $buscaCliente);
    if ( !$acesso1 ){
        die("Falha na consulta ao banco");
    }

	$consulta = mysqli_fetch_array($consulta);

	$query = "select * from cliente where id_cliente = ".$resultado['id'];

	$consulta = mysqli_query($conecta, $query);	
	
	$resultado = mysqli_fetch_array($consulta);
    

    $informacao1 = mysqli_fetch_assoc($acesso1);

    if ( empty($informacao1)) {   
        $query = "INSERT INTO CLIENTE (nome, email, logradouro, numero, bairro, cidade, estado, cep, telefone, celular, cnpj, inscricao_estadual, nome_fantasia) 
        VALUES ('$nome', '$email', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular', '$cnpj', '$inscricao', '$nomefantasia')";

        mysqli_query($conecta, $query);	

        $query = "select * from cliente where cpf = $cpf";

        $consulta = mysqli_query($conecta, $query);	

        $consulta = mysqli_fetch_array($consulta);

        echo '<div class="alert alert-success" role="alert">Cliente Jurídico cadastrado com sucesso</div>';

        print_r(array("id"=>$consulta['id'], "nome"=>consulta['nome']));
    } else{          
		echo '<div class="alert alert-danger" role="alert">CNPJ já cadastrado</div>';
		print_r(array("erro"=>'erro'));
    }
	exit;
}

if($acao == "update" or $acao == "read"){
	$query = "select * from cliente where id_cliente = $id";

	$resultado = mysqli_query($conecta, $query);

	$linha = mysqli_fetch_array($resultado);
	
	print_r(array("acao"=>$acao, "id"=>$linha["id_cliente"], "nome"=>utf8_encode($linha["nome"]), "email"=>utf8_encode($linha["email"]), "logradouro"=>utf8_encode($linha["logradouro"]), "numero"=>$linha["numero"], "bairro"=>utf8_encode($linha["bairro"]),
	"cidade"=>utf8_encode($linha["cidade"]), "estado"=>utf8_encode($linha["estado"]), "cep"=>$linha["cep"], "telefone"=>$linha["telefone"], "celular"=>$linha["celular"], "cpf"=>$linha["cpf"], "rg"=>$linha["rg"],
	"datanasc"=>$linha["data_nascimento"], "cnpj"=>$linha["cnpj"], "inscricao"=>$linha["inscricao_estadual"], "nomefantasia"=>utf8_encode($linha["nome_fantasia"])));
	
	exit;
}



if($operacao == "editar"){
	$query = "select * from cliente where id_cliente = $pk";

	$resultado = mysqli_query($conecta, $query);

	$linha = mysqli_fetch_array($resultado);

	

	if(isset($linha['cpf'])){
		$query = "update cliente set nome = '$nome', rg = '$rg', email = '$email', logradouro = '$rua', 
		numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', 
		telefone = '$telefone', celular = '$celular' where id_cliente = $pk";

		mysqli_query($conecta, $query);

		echo '<div class="alert alert-success" role="alert">Cliente Físico editado com sucesso</div>';
		
		print_r(array("pk"=>$pk, "nome"=>utf8_encode($nome)));

	}else if(isset($linha['cnpj'])){

		$query = "update cliente set nome = '$nome', nome_fantasia = '$nomefantasia', email = '$email', logradouro = '$rua', 
		numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', 
		telefone = '$telefone', celular = '$celular' where id_cliente = $pk";
		
		mysqli_query($conecta, $query);

		echo '<div class="alert alert-success" role="alert">Cliente Jurídico editado com sucesso</div>';
		
		print_r(array("pk"=>$pk, "nome"=>utf8_encode($nome)));
	}
	
	exit;
}

mysqli_close($conecta);

?>






