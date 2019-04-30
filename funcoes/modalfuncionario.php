<head>	
<script src="../crv/js/jquery.mask.js"></script>
<meta charset="utf-8" />
</head>
<body>

	<div class="modal fade bd-example-modal-xl" id="consultafuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			 <form id="addcliente"  method="post" enctype="multipart/form-data">
             <div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">Consulta de funcionário</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">


                    <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Nome:</label>
                          <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control"  placeholder="Digite o e-mail">
                        </div>
                    </div>
                    
				   <div  class="form-row">
                        <div id="fisica" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="CPF - somente os números" required>
                        </div>
                        <div id="fisica1" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">RG:</label>
                            <input class="form-control" id="rg" name="rg" type="text" placeholder="RG - somente os números">
                        </div>
                        <div id="fisica2" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Data de Nascimento:</label>
                            <input class="form-control" id="datanasc" name="datanasc" type="text" placeholder="Data de Nascimento -somente os números" required>
                        </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cargo:</label>
                            <input class="form-control" id="cargo" name="telefone" type="text" placeholder="Cargo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Data de Admissão:</label>
                            <input class="form-control" id="dataadm" name="celular" type="text" placeholder="Data de Admissão">
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
                </div>
                
			 </form>
		  </div>
	   </div>
	</div>
</body>

