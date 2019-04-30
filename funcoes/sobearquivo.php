<?php
//function arruma_arquivo($arquivo,$identificacao,$id)
function arruma_arquivo($arquivo, $identificacao, $nome)
{
	// Pasta onde o arquivo vai ser salvo
	if($identificacao = 'foto')
	{
		$_UP['pasta'] = '../crv/images/fotos/';
	}
	/*
	Referencias:
	https://www.php.net/manual/pt_BR/function.file-exists.php
	https://php.net/unlink
	https://www.php.net/manual/en/function.ctype-upper.php
	https://www.php.net/manual/pt_BR/function.strtoupper.php
	*/

	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 75000000; // 45Mb
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('jpg','pdf','jpeg','wav','mp3','png');
	// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
	$_UP['renomeia'] = true;
	// Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	/*if($arquivo['error'] <> 0 )
	{
		die('<div class="alert alert-danger" role="alert">Não foi possível fazer o upload, erro: ' . $_UP['erros'].'<>'.[$arquivo['error']].'</div>');
		exit; // Para a execução do script
	}*/
	// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
	// Faz a verificação da extensão do arquivo
	//$extensao = strtolower(end(explode('.', $arquivo['name'])));
	error_reporting(0);
	$extensao = strtolower(end(explode('.',$arquivo['name'])));
	if(in_array($extensao,$_UP['extensoes']))
	{
		// Faz a verificação do tamanho do arquivo
		/*if ($_UP['tamanho'] < $_FILES['arquivo']['size'])
		{
		  echo '<div class="alert alert-danger" role="alert">O arquivo enviado é muito grande, envie arquivos de até 45mb.</div>';
		  exit;
		}*/
		// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
		// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeia'] == true) 
		{
			// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = md5(time()).'-'.$identificacao.'.'.$extensao;		
		}
		else 
		{
		// Mantém o nome original do arquivo
		$nome_final = $_FILES['arquivo']['name'];
		}

		
		//Alternativa para criar nomes infinitos
		if($nome == null){
			move_uploaded_file($arquivo['tmp_name'], $_UP['pasta'].$nome_final);
		}
		else{
			unlink($_UP['pasta'].$nome);
			move_uploaded_file($arquivo['tmp_name'], $_UP['pasta'].$nome_final);
			//rename($_UP['pasta'].$nome, $_UP['pasta'].$nome_final);
		}
		
		/*
		if(file_exists($_UP['pasta'].strtoupper($nome_final))){
			unlink($_UP['pasta'].strtoupper($nome_final));
			move_uploaded_file($arquivo['tmp_name'], $_UP['pasta'].strtolower($nome_final));
			$nome_final = strtolower($_UP['pasta'].$nome_final);
		}
		if(file_exists($_UP['pasta'].strtolower($nome_final))){
			unlink($_UP['pasta'].strtolower($nome_final));
			move_uploaded_file($arquivo['tmp_name'], $_UP['pasta'].strtoupper($nome_final));
			$nome_final = strtoupper($_UP['pasta'].$nome_final);
		}
			*/
		
		
	}
	else
	{
		echo '<div class="alert alert-danger" role="alert">Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif</div>';
	  	exit;
	}
	return $nome_final;
	
}
?>