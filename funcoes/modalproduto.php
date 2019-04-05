<body>
	<?php
        error_reporting(0);
		if($acao == '')
		{
			$acao = 'incluir';
		}
	?>

	<div class="modal fade bd-example-modal-xl" id="cadastroCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			 <form id="addproduto"  method="post" enctype="multipart/form-data">
				<div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">Cadastro de Produto</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">
				   <input type="hidden" id="acao" name="acao" value="<?php echo $acao ?>">
                    
                    <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Nome:</label>
                          <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Preço:</label>
                            <input type="text" id="preco" name="preco" class="form-control"  placeholder="Preço do produto">
                        </div>
                    </div>
                    
				   <div  class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição:</label>
                            <input class="form-control" id="descricao" name="descricao" type="text" placeholder="Descrição do Produto">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Quantidade:</label>
                            <input class="form-control" id="quantidade" name="quantidade" type="number" placeholder="Quantidade do Produto em Estoque">
                        </div>
					</div>
					
					<div class="form-row">
						<div class="col-sm-7">
							<label for="inputEmail3">Foto</label>
							<input class="form-control" type="file" name ="foto" id="foto">									
						</div>
                    </div>

                  				   
				</div>
				<div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				   <button type="submit" class="btn btn-primary px-4">Enviar</button>
				</div>
			 </form>
			 <div id="res_server" style="margin-top: 10px"></div>
		  </div>
	   </div>
	</div>
</body>

<script>
	$(function(){
        $('#addproduto').submit(function(event){
		event.preventDefault();
		var formDados = new FormData($(this)[0]);
		var resultado;
		$.ajax({
			url:'../funcoes/cadproduto.php',
			type:'POST',
			data:formDados,
			cache:false,
			contentType:false,
			processData:false,
			success:function (data)
				{
				$("#res_server").html(data);
				},
			dataType:'html'
		});
		return false;
	   });
	});
</script>