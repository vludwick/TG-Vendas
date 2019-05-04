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
						$('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
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
            $('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
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
						$('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
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
            $('#resultado_busca').html('<a type="form-control" class="form-control" style="width:60%;padding:6px;border-color:#007bff;background:#007bff;font:16px;color:white;text-decoration:none;text-align: center;" name="confirmar" id="confirmar"><i ></i>Confirmar</a>');
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
                
				$('div#cancela_pedido').html('<a type="form-control" class="form-control" style="cursor: pointer;width:60%;padding:6px;border-color:#dc3545;background:#dc3545;;font:16px;color:white;text-decoration:none;text-align: center;" name="cancelar" id="cancelar"><i ></i>Cancelar</a>');
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
                if(retorno.tot > 0){
                    $('div#cancela_pedido').html('<a type="form-control" class="form-control" style="cursor: pointer;width:60%;padding:6px;border-color:#dc3545;background:#dc3545;;font:16px;color:white;text-decoration:none;text-align: center;" name="cancelar" id="cancelar"><i ></i>Cancelar</a>');
                }else { $('div#cancela_pedido').html('<a ><i ></i></a>');
                    
                }
			}
		});
	});
    
        
    $('#buscacliente').keyup(function(){
		var buscaTexto = $(this).val();

        console.log(buscaTexto);
		if(buscaTexto.length >= 1){
			$.ajax({
				method: 'post',
				url: 'sys/sys.php',
				data: {buscaCliente: 'sim', textoCliente: buscaTexto},
				dataType: 'json',
				success: function(retorno){
					if(retorno.qtd == 0){
						$('#resultado_busca4').html('<input  type="form-control" class="form-control" name="idcliente" id="" disabled>');
						$('#resultado_busca5').html('<input  type="form-control" class="form-control" name="id_cliente" id="id_cliente" value="" disabled>');
								 		
					}else{
						$('#resultado_busca4').html(retorno.dados);
						$('#resultado_busca5').html(retorno.dados1);
	
					}
				}
			});
            }else{
                $('#resultado_busca4').html('<input  type="form-control" class="form-control" name="idcliente" id="" disabled>');

            }
	});
});