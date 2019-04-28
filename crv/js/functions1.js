$(function(){
	$('#busca').keyup(function(){
		var buscaTexto = $(this).val();
		var qtD = $('#quantidade').val();

        
		if(buscaTexto.length >= 1){
			$.ajax({
				method: 'post',
				url: 'sys/sys.php',
				data: {busca: 'sim', texto: buscaTexto, qtdd: qtD},
				dataType: 'json',
				success: function(retorno){
					if(retorno.qtd == 0){
						$('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border:2px solid black;background:dodgerblue;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
						$('#resultado_busca1').html('<input type="form-control" class="form-control" name="precoproduto" id="precoproduto" disabled>');
						$('#resultado_busca2').html('<input type="form-control" class="form-control" name="totalproduto" id="totalproduto" disabled>');
				
					}else{
						$('#resultado_busca').html(retorno.dados);
						$('#resultado_busca1').html(retorno.dados1);
						$('#resultado_busca2').html(retorno.dados2);
	
					}
				}
			});
		}else{
            $('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border:2px solid black;background:dodgerblue;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
            $('#resultado_busca1').html('<input type="form-control" class="form-control" name="precoproduto" id="precoproduto" disabled>');
            $('#resultado_busca2').html('<input type="form-control" class="form-control" name="totalproduto" id="totalproduto" disabled>');
            
        }
	});
    
    $('#quantidade').change(function(){
		var buscaTexto = $('#busca').val();
		var qtD = $('#quantidade').val();

        
		if(buscaTexto.length >= 1){
			$.ajax({
				method: 'post',
				url: 'sys/sys.php',
				data: {busca: 'sim', texto: buscaTexto, qtdd: qtD},
				dataType: 'json',
				success: function(retorno){
					if(retorno.qtd == 0){
						$('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border:2px solid black;background:dodgerblue;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
						$('#resultado_busca1').html('<input type="form-control" class="form-control" name="precoproduto" id="precoproduto" disabled>');
						$('#resultado_busca2').html('<input type="form-control" class="form-control" name="totalproduto" id="totalproduto" disabled>');
				
					}else{
						$('#resultado_busca').html(retorno.dados);
						$('#resultado_busca1').html(retorno.dados1);
						$('#resultado_busca2').html(retorno.dados2);
	
					}
				}
			});
		}else{
            $('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border:2px solid black;background:dodgerblue;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
            $('#resultado_busca1').html('<input type="form-control" class="form-control" name="precoproduto" id="precoproduto" disabled>');
            $('#resultado_busca2').html('<input type="form-control" class="form-control" name="totalproduto" id="totalproduto" disabled>');
            
        }
	});
        
    
    
	$('body').on('click', '#resultado_busca a', function(){
		var dadosProduto = $(this).attr('id');
		var splitDados = dadosProduto.split(':');
        var qtD = $('#quantidade').val();

		$.ajax({
			method: 'post',
			url: 'sys/sys.php',
			data: {add_produto: 'sim', produto: splitDados[0], qtdd: qtD},
			dataType: 'json',
			success: function(retorno){                
				$('tbody#content_retorno').html(retorno.dados);
			}
		});
	});
    
    $('body').on('click', '#remover a', function(){
		var idProd = $(this).attr('id');
		$.ajax({
			method: 'post',
			url: 'sys/sys.php',
			data: {remove_produto: 'sim', ID: idProd},
			dataType: 'json',
			success: function(retorno){                
				$('tbody#content_retorno').html(retorno.dados);
			}
		});
	});
    
    
});