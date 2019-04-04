<head>	
<script src="../crv/js/jquery.mask.js"></script>
</head>
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
			 <form id="addcliente"  method="post" enctype="multipart/form-data">
				<div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">Cadastro de cliente</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">
				   <select id="options" name="options" onchange="verifica(this.value)" class="custom-select" style="width: 220px;">
					  <option value="1" selected>Pessoa Física</option>
					  <option value="2">Pessoa Jurídica</option>
				   </select>
				   <br/><br/>
				   <input type="hidden" id="acao" name="acao" value="<?php echo $acao ?>">
                    
                    <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">*Nome:</label>
                          <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control"  placeholder="Digite o e-mail">
                        </div>
                    </div>
                    
				   <div  class="form-row">
                        <div id="fisica" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">*CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="CPF - somente os números">
                        </div>
                        <div id="fisica1" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">*RG:</label>
                            <input class="form-control" id="rg" name="rg" type="text" placeholder="RG - somente os números">
                        </div>
                        <div id="fisica2" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Data de Nascimento:</label>
                            <input class="form-control" id="datanasc" name="datanasc" type="date" placeholder="Data de Nascimento -somente os números">
                        </div>
                  </div>
                    
				  <div  class="form-row">
                        <div id="juridica" class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-7 col-form-label">*Nome Fantasia:</label>
                            <input class="form-control" id="nomefantasia" name="nomefantasia" type="text" placeholder="Nome Fantasia">
                        </div>
                        <div id="juridica1" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">*CNPJ:</label>
                            <input class="form-control" id="cnpj" name="cnpj" type="text" placeholder="CNPJ - somente os números">
                        </div>
                        <div id="juridica2" class="form-group col-md-3">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">*Inscrição Estadual:</label>
                            <input class="form-control" id="inscricao" name="inscricao" type="text" placeholder="Insira a Inscrição Estadual">
                        </div>
                  </div> 
				   
				  <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Rua/Logradouro:</label>
                            <input class="form-control" id="rua" name="rua" type="text" placeholder="Rua ou Logradouro">    </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Número:</label>
                            <input class="form-control" id="numero" name="numero" type="text" placeholder="Número">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cep:</label>
                            <input class="form-control" id="cep" name="cep" type="text" placeholder="Cep - somente os números">
                       </div>
                  </div> 
				   
 
                  <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bairro:</label>
                            <input class="form-control" id="bairro" name="bairro" type="text" placeholder="Bairro">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cidade:</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
                            <input class="form-control" id="estado" name="estado" type="text" placeholder="Estado">
                        </div>
                  </div>

				   
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefone:</label>
                            <input class="form-control" id="telefone" name="telefone" type="text" placeholder="(00) 0000-0000  somente os números">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Celular:</label>
                            <input class="form-control" id="celular" name="celular" type="text" placeholder="(00) 00000-0000  somente os números">
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
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#celular').mask('(00) 00000-0000');
        $('#telefone').mask('(00) 0000-0000');
        $('#addcliente').submit(function(event){
		event.preventDefault();
		var formDados = new FormData($(this)[0]);
		var resultado;
		$.ajax({
			url:'../funcoes/cadcliente.php',
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
    
	document.getElementById("juridica").style.display = "none";
	document.getElementById("juridica1").style.display = "none";
	document.getElementById("juridica2").style.display = "none";
	
	function verifica(value){
		if(value == 1){
		  document.getElementById("fisica").style.display = "block";
		  document.getElementById("fisica1").style.display = "block";
		  document.getElementById("fisica2").style.display = "block";
		  document.getElementById("juridica").style.display = "none";
		  document.getElementById("juridica1").style.display = "none";
		  document.getElementById("juridica2").style.display = "none";
		}else if(value == 2){
		  document.getElementById("fisica").style.display = "none";
		  document.getElementById("fisica1").style.display = "none";
		  document.getElementById("fisica2").style.display = "none";
		  document.getElementById("juridica").style.display = "block";
		  document.getElementById("juridica1").style.display = "block";
		  document.getElementById("juridica2").style.display = "block";
		}
	};
   
   
</script>