<head>	
<script src="../crv/js/jquery.mask.js"></script>
<meta charset="utf-8" />
</head>
<body>

	<div class="modal fade bd-example-modal-xl" id="cadastroCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			 <form id="addcliente"  method="post" enctype="multipart/form-data">
				<div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel"></h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">
                <input type="hidden" id="operacao" name="operacao">
                <input type="hidden" id="pk" name="pk">
				   <select id="options" name="options" onchange="verifica(this.value)" class="custom-select" style="width: 220px;">
					  <option value="1" selected>Pessoa Física</option>
					  <option value="2">Pessoa Jurídica</option>
				   </select>
				   <br/><br/>

                    <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">*Nome:</label>
                          <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control"  placeholder="Digite o e-mail">
                        </div>
                    </div>
                    
				   <div  class="form-row">
                        <div id="fisica" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">*CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="CPF - somente os números" required>
                        </div>
                        <div id="fisica1" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">*RG:</label>
                            <input class="form-control" id="rg" name="rg" type="text" placeholder="RG - somente os números">
                        </div>
                        <div id="fisica2" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Data de Nascimento:</label>
                            <input class="form-control" id="datanasc" name="datanasc" type="date" placeholder="Data de Nascimento -somente os números" required>
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
                            <input class="form-control" id="rua" name="rua" type="text" placeholder="Rua ou Logradouro" required>    </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Número:</label>
                            <input class="form-control" id="numero" onkeypress="return somenteNumeros(event)" name="numero" type="text" placeholder="Número" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cep:</label>
                            <input class="form-control" id="cep" name="cep" onkeypress="return somenteNumeros(event)" type="text" placeholder="Cep - somente os números" required>
                       </div>
                  </div> 
				   
 
                  <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bairro:</label>
                            <input class="form-control" id="bairro" name="bairro" type="text" placeholder="Bairro" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cidade:</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
                            <input class="form-control" id="estado" name="estado" type="text" placeholder="Estado" required>
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
                    <div id="res_server"></div>
				</div>
				<div class="modal-footer">
                
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				   <button type="submit" id="enviar" class="btn btn-primary px-4">Enviar</button>
                </div>
                
			 </form>
		  </div>
	   </div>
	</div>
</body>

<script>
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#celular').mask('(00) 00000-0000');
        $('#telefone').mask('(00) 0000-0000');
        $('#rg').mask('00.000.000-0');
	
	$(function(){
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
                var nome = resptxt.slice(inicio_nome, resptxt.trim().length -1);
                nome = nome.trim();
                if(id != null){
                    var table = $('#cliente').DataTable();
                    var row = table.row.add( [id, nome, '<td><i class="fas fa-search" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>',
                    '<td><i class="fas fa-edit" data-toggle="modal" data-target="#cadastroCliente" style="cursor: pointer; color:royalBlue"></td>']).draw().node();
                    $(row).attr("id", id);
                }
                else if(pk != null){
                    $("#"+pk).children().eq(1).html(nome);
                }
 
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
          document.getElementById("cpf").required = true;
          document.getElementById("datanasc").required = true;
		  document.getElementById("juridica").style.display = "none";
		  document.getElementById("juridica1").style.display = "none";
		  document.getElementById("juridica2").style.display = "none";
          document.getElementById("nomefantasia").required = false;
          document.getElementById("cnpj").required = false;
		}else if(value == 2){
		  document.getElementById("fisica").style.display = "none";
		  document.getElementById("fisica1").style.display = "none";
		  document.getElementById("fisica2").style.display = "none";
          document.getElementById("cpf").required = false;
          document.getElementById("datanasc").required = false;
		  document.getElementById("juridica").style.display = "block";
		  document.getElementById("juridica1").style.display = "block";
		  document.getElementById("juridica2").style.display = "block";
          document.getElementById("nomefantasia").required = true;
          document.getElementById("cnpj").required = true;
		}
	};
    
    function limparCampos() { 
            document.getElementById("id").value = "";     
            document.getElementById("acao").value = "";  	
            document.getElementById("cpf").value = "";
            document.getElementById("nome").value = "";
            document.getElementById("rg").value = "";
            document.getElementById("cnpj").value = "";
            document.getElementById("cep").value = "";     
            document.getElementById("estado").value = "";     
            document.getElementById("bairro").value = "";     
            document.getElementById("celular").value = "";     
            document.getElementById("cidade").value = "";     
            document.getElementById("telefone").value = "";     
            document.getElementById("datanasc").value = "";     
            document.getElementById("inscricao").value = "";     
            document.getElementById("rua").value = "";     
            document.getElementById("nomefantasia").value = "";     
            document.getElementById("email").value = "";     
            document.getElementById("numero").value = "";     

    }
   
    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        if (charCode != 8 && charCode != 9) {
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    };
   
</script>