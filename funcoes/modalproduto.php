<head>	
<script src="../crv/js/jquery.mask.min.js"></script>
</head>
<body>

	<div class="modal fade bd-example-modal-xl" id="cadastroCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			 <form id="addproduto"  method="post" enctype="multipart/form-data">
				<div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel"></h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">
				   <input type="hidden" id="operacao" name="operacao">
				   <input type="hidden" id="pk" name="pk">
                    <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Nome:</label>
                          <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail3" id="dinheiro" class="col-sm-2 col-form-label">Preço:</label>
                            <input type="text" id="preco" name="preco" class="dinheiro form-control"  placeholder="Preço do produto" style="display:inline-block" required>
                        </div>
                    </div>
                    
				   <div  class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição:</label>
                            <input class="form-control" id="descricao" name="descricao" type="text" placeholder="Descrição do Produto" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Quantidade:</label>
                            <input class="form-control" id="quantidade" name="quantidade" type="number" value="15" placeholder="Quantidade do Produto em Estoque" required>
                        </div>
					</div>
					
					<div class="form-row">
						<div class="col-sm-7">
							<label for="inputEmail3">Foto:</label><br>
							<input class="form-control" type="file" name="foto" id="foto" required>
							<img src="images\fotos\prod1.jpg" id="imagem" height="240" width="240">
							
						</div>
					</div>
					<br>
					<button type="button" id="editafoto" class="btn btn-primary btn-lg">Editar Foto</button>

					

                  				   
				</div>
				<div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				   <button type="submit" id="enviar" class="btn btn-primary px-4">Enviar</button>
				</div>
			 </form>
			 <div id="res_server" style="margin-top: 10px"></div>
		  </div>
	   </div>
	</div>
</body>

<script>
    $('#preco').mask('#.##0,00', {reverse: true});

	$(document).on('click', "#editafoto", function(){
			$('#operacao').val("editarfoto");
			$('#foto').show();
			$('#foto').attr("required", "true");
			$('#imagem').hide();
			$('#editafoto').hide();
       });

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
				
				console.log(data);
				
                var inicio_array = data.indexOf("Array");
                var resphtml = data.slice(0, inicio_array);
                var resptxt = data.slice(inicio_array);
				$("#res_server").html(resphtml);
                limparCampos();
                if(resptxt.indexOf("[pk] => ") == -1){
                    var inicio_id = resptxt.indexOf("[id] => ") + "[id] => ".length;
                    var fim_id = resptxt.indexOf("[nome] => ");
                    var id = resptxt.slice(inicio_id, fim_id);
                    id = id.trim();
                    var pk = null;
                }
                else if(resptxt.indexOf("[id] => ") == -1){
                    var inicio_pk = resptxt.indexOf("[pk] => ") + "[pk] => ".length;
                    var fim_pk = resptxt.indexOf("[nome] => ");
                    var pk = resptxt.slice(inicio_pk, fim_pk);
                    pk = pk.trim();
                    var id = null;
                }
                var inicio_nome = resptxt.indexOf("[nome] => ") + "[nome] => ".length;
                var fim_nome = resptxt.indexOf("[descricao] =>");
				var inicio_descricao = resptxt.indexOf("[descricao] => ") + "[descricao] => ".length;
                var fim_descricao = resptxt.indexOf("[preco] =>")
				var inicio_preco = resptxt.indexOf("[preco] => ") + "[preco] => ".length;

				var nome = resptxt.slice(inicio_nome, fim_nome);
				var descricao = resptxt.slice(inicio_descricao, fim_descricao);
                var preco = resptxt.slice(inicio_preco, resptxt.trim().length -1);
				console.log('text:');
				console.log(resphtml);
				console.log('array');
				console.log(resptxt);
                nome = nome.trim();
                if(id != null){
                    var table = $('#produto').DataTable();
                    var row = table.row.add( [nome, descricao, preco, 0, 0, '<td><i class="fas fa-search" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>',
                    '<td><i class="fas fa-edit" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>']).draw().node();
                    $(row).attr("id", id);
					console.log('cadastrar');
                }
				
                else if(pk != null){
                    $("#"+pk).children().eq(0).html(nome);
					$("#"+pk).children().eq(1).html(descricao);
					$("#"+pk).children().eq(2).html(preco);
					console.log("editar");
                }
				
				/*
				$("#res_server").html(data);
                limparCampos();
				*/
				},
			dataType:'html'
		});
		return false;
	   });
	});
      
    
    function limparCampos() {       
            document.getElementById("descricao").value = "";
            document.getElementById("preco").value = "";
            document.getElementById("quantidade").value = "";
            document.getElementById("nome").value = "";
            document.getElementById("foto").value = "";     
    }
</script>