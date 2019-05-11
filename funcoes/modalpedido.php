<head>	
<script src="../crv/js/jquery.mask.js"></script>
<meta charset="utf-8" />
</head>
<body>

	<div class="modal fade bd-example-modal-xl" id="consultapedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			 <form id="addcliente"  method="post" enctype="multipart/form-data">
             <div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">Consulta de pedido</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				</div>
				<div class="modal-body">
                    
				   <div  class="form-row">
                        <div id="fisica" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Data:</label>
                            <input class="form-control" id="data" name="data" type="text" placeholder="Data do pedido" disabled=true>
                        </div>
                        <div id="fisica1" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cliente:</label>
                            <input class="form-control" id="cliente" name="cliente" type="text" placeholder="Cliente que realizou" disabled=true>
                        </div>
                        <div id="fisica2" class="form-group col-md-4">
                            <label for="inputEmail3" class="col-sm-10 col-form-label">Funcionário:</label>
                            <input class="form-control" id="funcionario" name="funcionario" type="text" placeholder="Funcionário que atendeu" disabled=true>
                        </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-7">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Total:</label>
                          <input class="form-control" id="total" name="total" type="text" placeholder="Valor total" disabled=true>
                        </div>
                    </div>
                    <div id="tabela">
            
                    </div>

				</div>
				<div class="modal-footer">
                
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                
			 </form>
		  </div>
	   </div>
	</div>
</body>

